<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-02-05 22:38:50
 */

namespace app\common\validate;

use think\Validate;

class Token extends Validate
{
    protected $rule = [
        '__token__' => "require|token",
    ];
}
