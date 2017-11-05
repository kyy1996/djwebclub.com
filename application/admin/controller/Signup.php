<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-06 12:58:51
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Activities;
use app\common\model\Signup as SignupModel;

/**
 * 活动报名管理
 * Class Signup
 * @package app\admin\controller
 */
class Signup extends base
{
    protected $Model = SignupModel::class;

    use curd;

    /**
     * 首页
     * @param int $stu_no
     * @param int $activity_id
     * @param int $time
     * @return \think\Response
     */
    public function index($stu_no = null, $activity_id = null, $time = null)
    {
        $Signup = new SignupModel();
        if ($stu_no) $Signup->where("stu_no", $stu_no);
        if ($activity_id) $Signup->where("activity_id", $activity_id);
        if ($time && count($time_range = explode(" - ", $time)) == 2) {
            $time_range[0] = strtotime($time_range[0]);
            $time_range[1] = strtotime($time_range[1]);
            $Signup->where("create_time", "between", $time_range);
        }
        $list = $Signup->order("id DESC")->paginate(50, false, ['query' => compact("stu_no", "activity_id", "time")]);
        $Activity = new Activities();
        $activities_list = $Activity::all();

        $this->assign("_activities_list", $activities_list);
        $this->assign("_list", $list);
        return $this->fetch();
    }

    /**
     * 导出活动报名名单
     * @param null $stu_no
     * @param null $activity_id
     * @param null $time
     * @return mixed
     */
    public function export($stu_no = null, $activity_id = null, $time = null)
    {
        $Checkin = new SignupModel();
        $Checkin::scope("normal");
        $map = [];
        if ($stu_no) $map["stu_no"] = $stu_no;
        if ($activity_id) $map["activity_id"] = $activity_id;
        if ($time && count($time_range = explode(" - ", $time)) == 2) {
            $time_range[0] = strtotime($time_range[0]);
            $time_range[1] = strtotime($time_range[1]);
            $map["create_time"] = ["between", $time_range];
        }
        $list = $Checkin::all(function ($query) use ($map) {
            $query->where($map);
        });

        $this->assign("_list", $list);
        return $this->fetch();
    }
}