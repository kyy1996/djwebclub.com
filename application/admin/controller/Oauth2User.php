<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

/**
 * 各应用授权用户管理
 * Class Oauth2User
 * @package app\admin\controller
 */
class Oauth2User extends Controller
{
    /**
     * 首页
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->fetch();
    }
}
