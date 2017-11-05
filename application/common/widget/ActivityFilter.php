<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/2/24
 * Time: 9:39
 */

namespace app\common\widget;

use app\common\model\Activities;
use app\common\model\Checkin as CheckinModel;

class ActivityFilter extends base
{
    public function show($data = [])
    {
        $Checkin = new CheckinModel();
        $_student_list = $Checkin->group("stu_no")->field("stu_no,class,name")->select();
        $_activity_list = Activities::all();
        $this->fetch("activity_filter/show", compact("_student_list", "_activity_list"));
    }
}