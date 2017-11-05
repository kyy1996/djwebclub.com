<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/1/25
 * Time: 13:28
 */

namespace app\common\validate\traits;


trait User
{
    public function checkUsername($value, $rule = "", $data)
    {
        $rule = "require|between:5,25";
        return $this->validate($value, $rule);
    }

    public function checkPassword($value, $rule = "", $data)
    {
        $rule = "require|between:5,25";
        return $this->validate($value, $rule);
    }

    private function validate($value, $rule)
    {
        $rule = ["data" => $rule];
        $validate = validate($rule);
        $data = ["data" => $value];

        return $validate->check($data);
    }
}