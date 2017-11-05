<?php

namespace app\common\model;

use think\Model;
use think\Request;

class AuthGroup extends Model
{
    protected $auto = ['module', 'status', "rules"];

    public function users()
    {
        return $this->belongsToMany("Member", "auth_group_access", "uid", "group_id");
    }

    public function setModuleAttr($value = "")
    {
        return $value === "" ? "admin" : $value;
    }

    public function setStatusAttr($value = 0)
    {
        return Request::instance()->has("status") ? 1 : 0;
    }

    public function getRulesAttr($rule)
    {
        return explode(",", $rule);
    }

    public function setRulesAttr($value)
    {
        if (is_null($value))
            return "";
        else
            return is_array($value) ? implode(",", $value) : $value;
    }
}
