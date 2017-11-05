<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-26 11:12:56
 */

namespace app\common\model;

use think\Model;
use think\Request;

class Blacklist extends Model
{
    protected $auto = ['valid', 'ip', 'uid'];
    protected $autoWriteTimestamp = true;

    protected function scopeNormal()
    {
        return $this->where("valid", 1);
    }

    protected function setValidAttr($value = "")
    {
        return +Request::instance()->request("valid") ? 1 : 0;
    }

    protected function setIpAttr($value = "")
    {
        return Request::instance()->ip();
    }

    protected function setUidAttr()
    {
        return +@is_login()['uid'] ?: 0;
    }
}