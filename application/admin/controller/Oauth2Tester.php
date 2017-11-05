<?php

namespace app\admin\controller;

use app\common\model\OauthClients;
use think\Request;

/**
 * OAuth2 应用测试平台
 * Class OAuth2Tester
 * @package app\admin\controller
 */
class Oauth2Tester extends base
{
    /**
     * 首页
     * @param Request $request
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $Model = new OauthClients();
        $_list = $Model->paginate();
        $_secret = $Model->column("client_secret", "client_id");
        $this->assign("_list", $_list);
        $this->assign("_secret", $_secret);
        return $this->fetch();
    }
}
