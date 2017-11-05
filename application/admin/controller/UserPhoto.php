<?php

namespace app\admin\controller;

use app\common\model\Checkin;
use think\Db;
use think\db\Query;
use think\paginator\driver\Bootstrap;
use think\Request;

/**
 * 社员照片
 * Class UserPhoto
 * @package app\admin\controller
 */
class UserPhoto extends base {
	const BASE_URL = "http://xsfw.sdju.edu.cn/xgxt/xsxx_xsgl.do?method=showPhoto&xh=";

	/**
	 * 首页
	 * @return \think\Response
	 */
	public function index() {
		$user_list =
			Db::name("checkin")->group("stu_no")->field("stu_no,name,class")->union(function ( Query $query ) {
				$query->name("signup")->field("stu_no,name,class")->group("stu_no")->union(function ( Query $query ) {
					$query->name("member_profile")->field("stu_no,name,class")->group("stu_no");
				});
			});
		$user_list = $user_list->select();
		$user_list->each(function ( $item, $i ) use ( $user_list ) {
			$item['photo_url'] = static::BASE_URL . $item['stu_no'];
			$user_list[ $i ]   = $item;
		});
		$ass["_list"] = $user_list;
		$this->assign($ass);

		return $this->fetch();
	}

	/**
	 * 显示照片
	 *
	 * @param Request $request
	 * @param string  $stu_no
	 *
	 * @return \think\Response
	 */
	public function photo( Request $request, $stu_no = "" ) {
		$stu_no    = $stu_no ?: @$request->input("filter")['stu_no'];
		$url       = static::BASE_URL . $stu_no;
		$cookiejar = "";
		$ch        = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiejar);
//        return response($content, 200, "Content-Type: image/jpeg");
		curl_setopt($ch, CURLOPT_URL, $url);
		$content = curl_exec($ch);
	}

	/**
	 * 查看班级照片
	 *
	 * @param Request $request
	 * @param string  $stu_no
	 *
	 * @return mixed
	 */
	public function classPhoto( Request $request, $stu_no = "" ) {
		$stu_no = $stu_no ?: @$request->param("filter/a")['stu_no'];
		if (!$stu_no)
			$this->redirect("index");
		$base = substr($stu_no, 0, - 3);
		$list = [];
		for ($j = 1; $j <= 2; $j ++) {
			for ($i = 1; $i < 50; $i ++) {
				$stu_no = $base . $j;
				$stu_no = $stu_no . sprintf('%02d', $i);
				$url    = static::BASE_URL . $stu_no;
				$list[] = [
					'photo_url' => $url,
					'name'      => '',
					'class'     => get_school_class($stu_no),
					'stu_no'    => $stu_no,
				];
			}
		}
		$this->assign('_list', $list);

		return $this->fetch('index');
	}
}
