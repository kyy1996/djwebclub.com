<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-21 21:25:31
 */

namespace app\common\validate;

use think\Validate;

class ActivitiesComment extends Validate
{
    protected $rule = [
        'nickname|昵称' => "require",
        'contact|联系方式' => "require",
        'content|评价内容' => "require|min:2",
    ];
}
