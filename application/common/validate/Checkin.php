<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-05 21:49:43
 */

namespace app\common\validate;

use think\Validate;

class Checkin extends Validate
{
    protected $rule = [
        'ip|IP' => "regex:(\d{1,3}\.){3}\d{1,3}",
        'stu_no|学号' => 'require|regex:stu_no',
        'class|班级' => 'require',
        'name|姓名' => 'require',
        'activity_id|活动' => 'require|number',
    ];

    protected $regex = [
        'stu_no' => "/\d{3}0{2}[1-9]\d{6}/"
    ];
}
