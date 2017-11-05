<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-21 23:47:26
 */

namespace app\common\validate;

use think\Validate;

class Gallery extends Validate
{
    protected $rule = [
        'title|标题' => "require",
        'url|图片' => "require|url",
        'class_name|分类名称' => "require",
    ];
}
