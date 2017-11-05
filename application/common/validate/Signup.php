<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-06 12:58:51
 */

namespace app\common\validate;

use think\Validate;

class Signup extends Validate
{
    protected $rule = [
        'stu_no|学号' => "require|length:6,12",
        'class|班级' => "require",
        'name|姓名' => "require",
        'contact|联系方式' => "require",
    ];
}
