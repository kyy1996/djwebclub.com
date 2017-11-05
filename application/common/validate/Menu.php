<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/1/25
 * Time: 13:01
 */

namespace app\common\validate;

use think\Validate;

class Menu extends Validate
{
    protected $rule = [
        "title|菜单标题" => "require|length:2,50",
        "sort|排序索引" => "number|min:0",
        'icon_class|图标类名' => "alphaDash"
    ];
}