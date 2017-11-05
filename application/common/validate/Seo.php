<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-22 00:31:14
 */

namespace app\common\validate;

use think\Validate;

class Seo extends Validate
{
    protected $rule = [
        'name|字段名' => "require",
        'value|值' => "require",
    ];
}
