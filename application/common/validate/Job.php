<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-06 19:45:50
 */

namespace app\common\validate;

use think\Validate;

class Job extends Validate
{
    protected $rule = [
        'name|职位名称' => "require",
        'department|部门' => "require",
    ];
}
