<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-04 22:24:40
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Category as CategoryModel;

/**
 * 分类管理
 * Class Category
 * @package app\admin\controller
 */
class Category extends base
{
    use curd;

    protected $Model = CategoryModel::class;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $Category = new CategoryModel();
        $list = $Category->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}