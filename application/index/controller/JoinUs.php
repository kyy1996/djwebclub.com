<?php

namespace app\index\controller;

use think\db\Query;
use app\common\model\Job as JobModel;
use app\common\model\JobApplications as JobApplicationsModel;

class JoinUs extends base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $Model = new JobModel();
        $_list = $Model::all();
        $this->assign("_list", $_list);
        return $this->fetch();
    }

    public function apply()
    {
        $Model = new JobApplicationsModel();
        $job_id = +input("job_id");
        $Job = JobModel::get($job_id);
        if (!$Job) $this->error("职位不存在");
        $stu_no = input("stu_no");
        $name = input("name");
        $map = compact("stu_no", "name", "job_id");
        $result = $Job->apply()->where($map)->find();
        if ($result) $this->error("您已经申请过该职位了");
        $map['class'] = input("class");
        $map['qq'] = input("qq");
        $map['resume'] = input("resume");
        $result = $Job->apply()->save($map);
        if ($result === false) $this->error($Model->getError());
        $this->success("申请成功！请等待管理员回复。谢谢！");
    }

    public function getUserApplyList($stu_no = 0, $name = "")
    {
        $Model = new JobApplicationsModel();
        $map['stu_no'] = $stu_no;
        $list = $Model->with("job")->where($map)->select();
        if (!$list) $this->error("您还未报名，请先报名吧～");
        if ($list[0]['name'] != $name) $this->error("个人信息与系统的记录不相符，请检查");

        foreach ($list as $item) {
            $item->setAttr("status_text", $item->status_text);
        }
        $this->success($list);
    }
}
