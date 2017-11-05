<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/1/26
 * Time: 0:13
 */

namespace app\common\validate;


use think\Validate;

class Member extends Validate
{
    protected $rule = [
        'avatar_file|头像' => "image",
        "email|E-Mail" => "require|email|regex:/^([\w\.])+@([\w\.])+$/|unique:Member,email,,uid",
        'mobile|手机号' => 'require|regex:mobile|unique:Member,mobile,,uid',
        "password|密码" => 'require|length:6,25',
        "password_confirm|重复密码" => 'requireWith:password|confirm:password',
        'stu_no|学号' => 'regex:stu_no|unique:MemberProfile,stu_no,,uid',
        'school|学院' => 'requireWith:stu_no',
        'class|班级' => 'requireWith:stu_no',
        'name|姓名' => 'requireWith:stu_no',
    ];

    protected $regex = [
        'mobile' => "/^(\+(\d){1,3}){0,1}\d{11}$/",
        'stu_no' => '/^[1-9]\d{2}00\d{7}$/'
    ];

    protected $message = [
        'email.unique' => "E-Mail已被注册",
        'password_confirm.confirm' => "两次输入密码不一致",
        'stu_no.regex' => '学号格式不正确',
        'stu_no.unique' => '学号已被注册，请直接用学号登录。若不是您本人操作，请联系管理员。',
        'school.requireWith' => '学院不能为空',
        'class.requireWith' => '班级不能为空',
        'name.requireWith' => '姓名不能为空',
    ];

    protected $scene = [
        'update' => ['email', 'mobile', 'password' => "length:6,25", 'password_confirm', 'avatar_file', 'stu_no', 'school', 'name', 'class'],
    ];

    protected function unique($value, $rule, $data, $field)
    {
        $rule = explode(",", $rule);
        if (key_exists("uid", $data) && +$data["uid"]) $rule[2] = $data['uid'];
        $rule = implode(",", $rule);
        return parent::unique($value, $rule, $data, $field);
    }
}