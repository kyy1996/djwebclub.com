<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-06 12:58:51
 */

namespace app\common\model;

use think\db\Query;
use think\Model;
use think\Request;

class Signup extends Model
{
    protected $auto = ['valid', 'ip'];
    protected $autoWriteTimestamp = true;


    protected function setValidAttr($value = "")
    {
        return +$value;
    }

    protected function setIpAttr()
    {
        return Request::instance()->ip();
    }

    public function activity()
    {
        return $this->belongsTo("Activities", "activity_id");
    }

    protected function scopeNormal(Query $query)
    {
        return $query->where(['valid' => 1]);
    }
}