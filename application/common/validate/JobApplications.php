<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-06 20:34:00
 */

namespace app\common\validate;

use think\Validate;

class JobApplications extends Validate
{
    protected $rule = [
        'job_id|报名职位' => "require",
        'name|姓名' => "require",
        'stu_no|学号' => "require",
        'class|班级' => "require",
        'qq|QQ' => "require",
        'resume|简历' => "require",
        'status|状态' => "require",
    ];
}
