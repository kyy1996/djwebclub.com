<?php

namespace app\index\controller;

use \app\common\model\Gallery as GalleryModel;

class Gallery extends base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $Model = new GalleryModel();
        $_list = $Model->paginate(20);
        $this->assign("_list", $_list);
        return $this->fetch();
    }
}
