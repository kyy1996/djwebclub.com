<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-05 22:38:50
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Activities as ActivitiesModel;
use Endroid\QrCode\QrCode;
use think\Request;

/**
 * 活动管理
 * Class Activity
 * @package app\admin\controller
 */
class Activity extends base
{
    use curd;

    protected $Model = ActivitiesModel::class;

    /**
     * 首页
     * @param Request $request
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $Activities = new ActivitiesModel();
        if ($type = $request->get("type")) $Activities->where("type", $type);
        $list = $Activities->order("id", "DESC")->paginate(20);
        $_type = $Activities->group("type")->field("type")->select();
        $_location = $Activities->group("location")->field("location")->select();
        $_host = $Activities->group("host")->field("host")->select();
        $this->assign("_list", $list);
        $this->assign(compact("_type", "_location", "_host"));
        return $this->fetch();
    }


    /*public function update(Request $request, $id = 0)
    {
        $Model = new ActivitiesModel();
        if ($id && !$Model = $Model::get($id)) {
            $this->error("数据不存在");
        }
        $result = $Model->validate(true)->save($request->request());
        if ($result === false) $this->error("操作失败：" . $Model->getError());
        $this->success("操作成功");
    }

    public function delete(Request $request, $ids)
    {
        if (!is_array($ids)) $ids = explode(",", $ids);
        if (!$ids) $this->error("参数错误");

        $Model = new ActivitiesModel();
        foreach ($ids as $id) {
            $result = $Model::get($id);
            $result && $result = $result->delete();
            if ($result === false) $this->error("操作失败：" . $Model->getError());
        }
        $this->success("操作成功");
    }*/

    /**
     * AJAX得到签到二维码
     * @param int $activity
     */
    public function ajaxGetQrCode($activity = 0)
    {
        if (!$activity) $this->error("参数错误");
        $Model = new ActivitiesModel();
        $_info = $Model::get($activity);
        $_info || $this->error("没有找到您选择的正在进行的活动");
        $url = $this->getCheckinUrl($activity);
        $this->success("<div style='width: 600px;height: 600px;'><img style='width:100%' src='" . url("showQrCode", ['activity' => $activity]) . "'></div><div class='text-center' style='padding-bottom: 15px;'><a class='btn btn-primary' href='{$url}' target='_blank'>查看页面</a></div>");
    }


    /**
     * 展示签到二维码
     * @param int $activity
     * @return \think\Response
     */
    public function showQrCode($activity = 0)
    {
        if (!$activity) $this->error("参数错误");

        $url = $this->getCheckinUrl($activity);
        $qrCode = new \Endroid\QrCode\QrCode();
        $qrCode->setText($url)
            ->setSize(800)
            ->setErrorCorrection("low")
            ->setForegroundColor(["r" => 0, "g" => 0, "b" => 0])
            ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255])
            ->setImageType(QrCode::IMAGE_TYPE_PNG);
        return response($qrCode->get())->contentType($qrCode->getContentType());
    }

    /**
     * 得到签到地址
     * @param $activity
     * @return string
     */
    private function getCheckinUrl($activity)
    {
        $data = $activity . "," . time();
        $DES = new \OpenSSL();
        $data = urlencode($DES->sign($data));
//        $url = "http://" . $_SERVER['HTTP_HOST'] . Request::instance()->root() . "/activity/checkin.html?hash=" . $data;
        $url = "http://www.djwebclub.com" . Request::instance()->root() . "/checkin/index.html?hash=" . $data;
        return $url;
    }
}