<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-26 11:12:56
 */

namespace app\common\validate;

use think\Validate;

class Blacklist extends Validate
{
    protected $rule = [
        'stu_no|学号' => "require",
        'class|班级' => "require",
        'name|姓名' => "require",
        'comment|备注' => "require",
    ];
}
