<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/1/15
 * Time: 10:03
 */

namespace app\admin\controller;


use app\common\api\Auth;
use app\common\model\Menu;
use think\Controller;
use think\File;
use think\Request;

/**
 * 管理控制器基类
 * Class base
 * @package app\admin\controller
 */
class base extends Controller
{
    /**
     * 用户数据
     * @var null|\stdClass
     */
    protected $user = null;

    /* 允许未登录状态访问的地址 */
    protected $public_uri = [
        "admin/user/login",
        "admin/user/logout",
    ];

    /**
     * 初始化方法
     */
    protected function _initialize()
    {
        //构造左侧目录
        $Menu = new Menu();
        $uri  = strtolower($Menu->getCurrentUri());

        //用户未登录，跳转至登录页
        if (!in_array($uri, $this->public_uri) && !$this->user = is_login()) $this->redirect("admin/user/login", ["callback" => base64_encode($uri)]);

        //得到导航信息，当前节点、父级节点、树型列表等
        $navigation = $Menu->getNavigationInfo();

        if ($this->user['type'] <= 1) {
            $Auth = new Auth();
            if (!in_array($uri, $this->public_uri)
                && !$Auth->check($uri, $this->user['uid'])
            )
                $this->error("没有权限");
            foreach ($navigation['menu'] as $key => $item) {
                if (!$Auth->check($item['url'], $this->user['uid'])) unset($navigation['menu'][$key]);
            }
            $navigation['tree'] = list2tree($navigation['menu']);
        }
        $this->assign("__user", $this->user);
        $this->assign("__navigation_info", $navigation);
    }

    /**
     * 上传方法
     * TODO 待删除
     * @param $name
     * @return false|\SplFileInfo|File
     */
    protected function upload($name)
    {
        $file = Request::instance()->file($name);
        $path = ROOT_PATH . "public" . DS . "uploads";
        $info = $file->move($path);

        return $info;
    }
}