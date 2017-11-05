<?php

namespace app\admin\controller;

/**
 * 开发工具
 * Class Development
 * @package app\admin\controller
 */
class Development extends base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return $this->fetch();
    }
}
