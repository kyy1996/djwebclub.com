<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-05 21:49:43
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Checkin as CheckinModel;

/**
 * 签到管理
 * Class Checkin
 * @package app\admin\controller
 */
class Checkin extends base
{
    use curd;

    protected $Model = CheckinModel::class;

    /**
     * 首页
     * @param int $stu_no
     * @param int $activity_id
     * @param int $time
     * @return \think\Response
     */
    public function index($stu_no = 0, $activity_id = 0, $time = 0)
    {
        $Checkin = new CheckinModel();
        if ($stu_no) $Checkin->where("stu_no", $stu_no);
        if ($activity_id) $Checkin->where("activity_id", $activity_id);
        if ($time && count($time_range = explode(" - ", $time)) == 2) {
            $time_range[0] = strtotime($time_range[0]);
            $time_range[1] = strtotime($time_range[1]);
            $Checkin->where("create_time", "between", $time_range);
        }
        $list = $Checkin->order("id DESC")->paginate(50, false, ['query' => compact("stu_no", "activity_id", "time")]);

        $this->assign("_list", $list);
        return $this->fetch();
    }

    /**
     * 导出签到名单
     * @param int $stu_no
     * @param int $activity_id
     * @param int $time
     * @return mixed
     */
    public function export($stu_no = 0, $activity_id = 0, $time = 0)
    {
        $Checkin = new CheckinModel();
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