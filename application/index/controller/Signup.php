<?php

namespace app\index\controller;

use app\common\model\Activities as ActivitiesModel;
use app\common\model\Signup as SignupModel;
use think\db\Query;

class Signup extends base
{
    public function index($id)
    {
        $Model = $this->checkActivity($id);
        $this->assign("_info", $Model);
        $this->success($this->fetch());
    }

    public function quit($stu_no, $activity)
    {
        try {
            $Model = new SignupModel();
            $Model->transaction(function () use ($Model, $stu_no, $activity) {
                $map = [
                    'stu_no' => $stu_no,
                    'activity_id' => $activity,
                    'valid' => 1
                ];
                $data = ['valid' => 0];
                $result = $Model::get(function (Query $query) use ($map) {
                    return $query->where($map);
                });
                $result->save($data);
                $result->activity()->where(["id" => $activity])->setDec("signup_amount");
            });
        } catch (\Exception $e) {
            $this->error("退课失败。你真的选了这门课吗？");
        }
        $this->success("退课成功！");
    }

    public function signup($id, $stu_no = "", $name = "", $class = "", $contact = "")
    {
        $Model = $this->checkActivity($id, $stu_no);
        try {
            $Model->transaction(function () use ($Model, $id, $stu_no, $name, $class, $contact) {
                $stu_no = trim($stu_no);
                $name = trim($name);
                $class = trim($class);
                $contact = trim($contact);
                $data = compact("stu_no", "name", "class", "contact");
                $data['valid'] = 1;
                $data['ua'] = request()->server('HTTP_USER_AGENT');
                $Model->signup()->save($data);
                $Model->where("id", $id)->setInc("signup_amount");
            });
        } catch (\Exception $e) {
            $this->error("操作失败，请稍后重试");
        }
        $this->success("报名成功！请等待活动通知。谢谢！");
    }

    public function getUserActivityList($stu_no = 0, $name = "")
    {
        $Model = new SignupModel();
        $list = $Model::scope("normal")->with("activity")->where("stu_no", $stu_no)->select();
        if (!$list->count()) $this->error("您还未选课，请先选课吧～");
        if ($list[0]['name'] !== $name) $this->error("个人信息与系统的记录不相符，请检查");
        $this->success($list);
    }

    protected function checkActivity($id, $stu_no = 0)
    {
        /** @var ActivitiesModel $Model */
        $Model = ActivitiesModel::get($id);
        if (!$Model) $this->error("活动不存在");
        $Model->pause && $this->error("活动已暂停");
        if ($Model->signup_amount == $Model->available) $this->error("活动的余量为0，下次手速快一些吧~<br>您也可以报名参加其他活动");
        if ($stu_no && $Model->signup()->where(["stu_no" => $stu_no, "valid" => 1])->select()->count()) $this->error("您已经报名参加了该活动");
        return $Model;
    }
}
