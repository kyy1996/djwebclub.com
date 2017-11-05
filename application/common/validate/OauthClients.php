<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: validate
 * Time: 2017-05-02 01:00:15
 */

namespace app\common\validate;

use think\Validate;

class OauthClients extends Validate
{
    protected $rule = [
        'client_id|应用ID' => "require|unique:OauthClients,client_id,,id",
        'redirect_uri|跳转地址' => "url",
        'grant_types|授权类型' => "require",
    ];

    protected function unique($value, $rule, $data, $field)
    {
        $rule = explode(",", $rule);
        if (key_exists("id", $data) && $data["id"]) $rule[2] = $data['id'];
        $rule = implode(",", $rule);
        return parent::unique($value, $rule, $data, $field);
    }
}
