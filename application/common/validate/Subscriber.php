<?php
/**
 * Created by PhpStorm.
 * User: Alen
 * Date: 2017/6/16
 * Time: 22:15
 */

namespace app\common\validate;


use think\Validate;

class Subscriber extends Validate
{
    protected $rule = [
        "email|E-Mail" => "require|email|regex:/^([\w\.])+@([\w\.])+$/|unique:Subscriber,email,,id",
    ];

    protected $message = [
        'email.unique' => "您已经订阅过了，不必重复订阅"
    ];

    protected function unique($value, $rule, $data, $field)
    {
        $rule = explode(",", $rule);
        if (key_exists("id", $data) && +$data["id"]) $rule[2] = $data['id'];
        $rule = implode(",", $rule);
        return parent::unique($value, $rule, $data, $field);
    }
}