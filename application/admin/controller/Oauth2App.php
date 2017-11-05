<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-05-02 01:00:15
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\OauthClients as OauthClientsModel;

/**
 * 应用管理
 * Class Oauth2App
 * @package app\admin\controller
 */
class Oauth2App extends base
{
    protected $Model = OauthClientsModel::class;

    use curd;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $OauthClients = new OauthClientsModel();
        $list = $OauthClients->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}