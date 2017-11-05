<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-06 19:45:50
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Job as JobModel;

/**
 * 招募管理
 * Class Job
 * @package app\admin\controller
 */
class Job extends base
{
    protected $Model = JobModel::class;

    use curd;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $Job = new JobModel();
        $list = $Job->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}