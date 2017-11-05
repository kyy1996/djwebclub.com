<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-05 22:38:50
 */

namespace app\common\validate;

use think\Validate;

class Activities extends Validate
{
    protected $rule = [
        'name|活动名称' => "require",
        'type|活动类型' => "require",
        'location|活动地点' => "require",
        'host|主持人' => "require",
        'available|活动容量' => "number|min:0",
    ];
}
