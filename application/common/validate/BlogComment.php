<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-26 00:37:51
 */

namespace app\common\validate;

use think\Validate;

class BlogComment extends Validate
{
    protected $rule = [
        'nickname|昵称' => "require",
        'email|E-Mail' => "require|email",
        'content|内容' => "require|min:2",
    ];
}
