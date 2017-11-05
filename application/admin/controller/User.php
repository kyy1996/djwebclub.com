<?php

namespace app\admin\controller;

use app\admin\controller\traits\delete;
use app\api\controller\OSSHelper;
use app\common\model\AuthGroup;
use app\common\model\Member;
use think\Collection;
use think\Loader;
use think\Request;

/**
 * 用户管理
 * Class User
 * @package app\admin\controller
 */
class User extends base
{
    use delete;
    protected $Model = Member::class;

    /**
     * 用户列表
     * @return \think\Response
     */
    public function index()
    {
        $Member = new Member();
        $list   = $Member->with("profile")->paginate(20);
        $list->each(function (&$item, $i) use ($list) {
            if (!$item->profile) {
                $item->profile()->save([]);
                $list[$i] = Member::get($item->uid, 'profile');
            }
        });

        $UserGroup = new AuthGroup();
        /** @var Collection $group_list */
        $group_list = $UserGroup::all();

        $this->assign("_list", $list);
        $this->assign("_group_list", $group_list);

        return $this->fetch();
    }

    /**
     * 用户登录
     * @param Request $request
     * @param string  $username
     * @param string  $password
     * @return mixed|string
     */
    public function login(Request $request, $username = "", $password = "")
    {
        if ($request->isAjax()) {
            if (!$this->validate($request->post(), "Token")) $this->error('非法访问');
            $Member = new Member();
            $result = $Member->login($username, $password);
            if ($result > 0) {
                $redirect = input("callback") ? base64_decode(input("callback")) : "admin/index/index";
                $this->success("登录成功", $redirect);
            } else {
                $this->error($Member->getError());
            }

            return "";
        } else {
            return $this->fetch();
        }
    }

    /**
     * 修改用户
     * @param Request $request
     * @param int     $uid
     */
    public function update(Request $request, $uid = 0)
    {
        $data      = $request->request();
        $validator = Loader::validate("Member");
        $Model     = new Member();

        if ($uid) {
            if (key_exists("password", $data) && !$data['password']) unset($data['password']);
            $Model = $Model::get($uid, 'profile');
            if (!$Model) $this->error("用户{$uid}不存在");
            $validator = $validator->scene("update");
        }

        $data['avatar_file'] = $request->file("avatar_file");

        if (!$validator->check($data)) $this->error($validator->getError());

        if ($data['avatar_file']) {
            $OSS = new OSSHelper();
            $url = $OSS->upload($data['avatar_file']);
            if ($url)
                $data['avatar'] = $url;
        }

        $result = $Model->allowField(true)->save($data);
        if ($result === false) $this->error($Model->getError());
        $profile = $request->only(["stu_no", 'school', 'class', 'name']);
        $result  = $Model->profile->save($profile);
        if ($result === false) $this->error($Model->getError());
        //新增用户组
        $user_group_addition = $request->request("user_group_addition") ? explode(",", $request->request("user_group_addition")) : [];
        $user_group_addition && $Model->userGroups()->attach($user_group_addition);

        //删除用户组
        $user_group_deletion = $request->request("user_group_deletion") ? explode(",", $request->request("user_group_deletion")) : [];
        $user_group_deletion && $Model->userGroups()->detach($user_group_deletion);

        $uid = $Model->getAttr("uid");
        $this->success("用户{$uid}保存成功");
    }

    /**
     * 注销用户
     */
    public function logout()
    {
        $Member = new Member();
        $Member->logout();
        $this->success("注销成功", "user/login");
    }
}