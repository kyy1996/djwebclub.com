<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-22 00:31:14
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Seo as SeoModel;

/**
 * SEO相关
 * Class Seo
 * @package app\admin\controller
 */
class Seo extends base
{
    protected $Model = SeoModel::class;

    use curd;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $Seo = new SeoModel();
        $list = $Seo->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}