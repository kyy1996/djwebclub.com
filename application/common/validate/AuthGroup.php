<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/1/26
 * Time: 0:13
 */

namespace app\common\validate;


use think\Validate;

class AuthGroup extends Validate
{
    protected $rule = [
        "title|用户组名称" => "require",
        "description|用户组描述" => 'length:0,255',
    ];
}