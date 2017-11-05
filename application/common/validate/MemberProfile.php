<?php
/**
 * Created by PhpStorm.
 * User: Alen
 * Date: 2017/7/3
 * Time: 19:06
 */

namespace app\common\validate;


use think\Validate;

class MemberProfile extends Validate
{
    protected $rule = [
        "stu_no" => "regex:stu_no|unique:member_profile,stu_no,,uid"
    ];

    protected function unique($value, $rule, $data, $field)
    {
        $rule = explode(",", $rule);
        if (key_exists("uid", $data) && +$data["uid"]) $rule[2] = $data['uid'];
        $rule = implode(",", $rule);
        return parent::unique($value, $rule, $data, $field);
    }
}