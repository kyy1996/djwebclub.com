<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-04 21:59:28
 */

namespace app\common\validate;

use think\Validate;

class Statistic extends Validate
{
    protected $rule = [
        'ip|IP' => "require|ip",
        'module|模块' => "require",
        'controller|控制器' => "require",
        'action|操作' => "require",
        'referer|来源' => "url",
    ];
}
