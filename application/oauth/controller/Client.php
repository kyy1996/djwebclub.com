<?php

namespace app\oauth\controller;

use think\Controller;

class Client extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $this->fetch();
    }

    public function notify()
    {

    }
}
