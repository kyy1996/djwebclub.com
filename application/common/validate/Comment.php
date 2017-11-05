<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-06 22:29:12
 */

namespace app\common\validate;

use think\Validate;

class Comment extends Validate
{
    protected $rule = [
        'nickname|昵称'  => "require",
        'email|E-Mail' => "require|email|regex:^([\w\.])+@([\w\.])+$",
        'content|留言内容' => "require|min:2|token",
    ];
}
