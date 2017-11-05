<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-21 23:47:26
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Gallery as GalleryModel;

/**
 * 画廊
 * Class Gallery
 * @package app\admin\controller
 */
class Gallery extends base
{
    protected $Model = GalleryModel::class;

    use curd;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $Gallery = new GalleryModel();
        $list = $Gallery->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}