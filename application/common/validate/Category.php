<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-04 22:24:40
 */

namespace app\common\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'name|分类名称' => "require",
    ];
}
