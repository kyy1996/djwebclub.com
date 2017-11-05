<?php

namespace app\admin\controller;

use app\common\model\AuthGroup;
use app\common\model\Menu;

/**
 * 权限管理
 * Class AuthManager
 * @package app\admin\controller
 */
class AuthManager extends base
{
    /**
     * 首页
     * @param int $group_id
     * @return \think\Response
     */
    public function index($group_id = null)
    {
        $auth = $group_id ? AuthGroup::get($group_id) : (new AuthGroup)->find();
        if (!$auth) $this->error($group_id ? "用户组{$group_id}不存在" : "当前不存在任何用户组");

        $group_list = AuthGroup::all();
        $Menu = new Menu();
        $Menu = tree2list($Menu->getTree());
        $this->assign("_auth", $auth->toArray());
        $this->assign("_group_list", $group_list);
        $this->assign("_node", $Menu);
        return $this->fetch();
    }

    /**
     * 保存
     * @param $group_id
     * @param array $rule
     */
    public function update($group_id, $rule = [])
    {
        $Group = AuthGroup::get($group_id);
        if (!$Group) $this->error("操作失败");
        $result = $Group->save(["rules" => $rule]);
        if ($result === false) $this->error("操作失败");
        $this->success("操作成功");
    }
}
