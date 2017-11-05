<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-06 20:34:00
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Job;
use app\common\model\JobApplications as JobApplicationsModel;

/**
 * 报名管理
 * Class JobApply
 * @package app\admin\controller
 */
class JobApply extends base
{
    protected $Model = JobApplicationsModel::class;

    use curd;

    /**
     * 首页
     * @param int $job_id
     * @return \think\Response
     */
    public function index($job_id = 0)
    {
        $JobApplications = new JobApplicationsModel();
        if ($job_id) $JobApplications->where(compact("job_id"));
        $list = $JobApplications->order("create_time DESC")->paginate(20);

        $Job = new Job();
        $job_list = $Job::all();

        $this->assign("_list", $list);
        $this->assign("_job_list", $job_list);
        return $this->fetch();
    }

    public function export($job_id = 0)
    {
        $JobApplications = new JobApplicationsModel();
        if ($job_id) $JobApplications->where(compact("job_id"));
        $list = $JobApplications->order("create_time DESC")->select();
        $this->assign("_list", $list);
        return $this->fetch();
    }
}