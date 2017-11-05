<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/2/10
 * Time: 20:06
 */

namespace app\api\controller;


use think\Config;
use think\Controller;
use think\Request;

class base extends Controller
{
    protected $user;

    protected function _initialize()
    {
        if (!Request::instance()->isPost()) $this->error("非法访问");
        $this->user = is_login();
        if (!$this->user) $this->error("用户未登录", "admin/user/login");
    }

    /**
     * 获取当前的response 输出类型
     * @access protected
     * @return string
     */
    protected function getResponseType()
    {
        return Config::get('default_ajax_return');
    }
}