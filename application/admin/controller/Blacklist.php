<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-26 11:12:56
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Blacklist as BlacklistModel;

/**
 * 黑名单
 * Class Blacklist
 * @package app\admin\controller
 */
class Blacklist extends base
{
    protected $Model = BlacklistModel::class;

    use curd;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $Blacklist = new BlacklistModel();
        $list = $Blacklist->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}