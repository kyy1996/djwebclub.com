<?php

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\AuthGroup as UserGroupModel;
use app\common\model\Member;
use think\model\relation\BelongsToMany;

/**
 * 用户组管理
 * Class UserGroup
 * @package app\admin\controller
 */
class UserGroup extends base
{
    use curd;
    protected $Model = UserGroupModel::class;

    /**
     * 首页
     * @param int $uid
     * @return \think\Response
     * @internal param Request $request
     */
    public function index($uid = 0)
    {
        if ($uid) {
            $user = Member::get($uid);
            if (!$user) $this->error("用户{$uid}不存在");
            $_list = $user->user_groups;
        } else {
            $_list = UserGroupModel::all();
            $user = [];
        }
        $this->assign("_user", $user);
        $this->assign("_list", $_list);
        return $this->fetch();
    }

    /**
     * 查看用户组中的用户
     * @param int $group_id
     * @return mixed
     */
    public function users($group_id = 0)
    {
        if ($group_id) {
            $Model = UserGroupModel::get($group_id);
        } else {
            $Model = (new UserGroupModel)->find();
        }
        if (!$Model) $this->error($group_id ? "用户组{$group_id}不存在" : "当前没有任何用户组");

        $_group_list = UserGroupModel::all();
        $_group = $Model;

        $this->assign("_group_list", $_group_list);
        $this->assign("_group", $_group);
        return $this->fetch();
    }

    /**
     * 添加用户至用户组
     * @param $group_id
     * @param $uid
     */
    public function userUpdate($group_id, $uid)
    {
        /**
         * @var BelongsToMany $UserGroup
         */
        $Group = UserGroupModel::get($group_id);
        if (!$Group) $this->error("用户组{$group_id}不存在");
        $uid = explode(",", $uid);
        $Member = Member::all(["uid" => ['in', $uid]]);
        if (!$Member) $this->error("用户不存在");
        foreach ($Member as $item) {
            foreach ($item->userGroups as $value)
                if ($value->id == $group_id) $this->error("用户 " . $item->email . " 已存在于用户组 " . $value->title);
            $UserGroup = $item->userGroups();
            $result = $UserGroup->attach($group_id);
            if ($result === false) $this->error("操作失败");
        }
        $this->success("操作成功");
    }

    /**
     * 从用户组删除用户
     * @param $uid
     * @param $group_id
     */
    public function userDelete($uid, $group_id)
    {
        $Member = Member::get($uid);
        if (!$Member) $this->error("用户{$uid}不存在");
        $result = $Member->userGroups()->detach($group_id);
        if ($result === false) $this->error("操作失败");
        else $this->success("操作成功");
    }
}
