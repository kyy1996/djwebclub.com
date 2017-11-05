<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-09 16:21:09
 */

namespace app\common\validate;

use think\Validate;

class Blog extends Validate
{
    protected $rule = [
        'title|标题' => "require",
        'content|内容' => "require",
    ];
}
