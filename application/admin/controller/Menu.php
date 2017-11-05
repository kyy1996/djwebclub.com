<?php

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Menu as MenuModel;

/**
 * 菜单与权限节点管理
 * Class Menu
 * @package app\admin\controller
 */
class Menu extends base
{
    use curd;
    protected $Model = MenuModel::class;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $Menu = new MenuModel();
        $tree = $Menu->getTree();
        $list = tree2list($tree);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}