<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-05 21:49:43
 */

namespace app\common\model;

use think\Model;

class Checkin extends Model
{
    protected $autoWriteTimestamp = true;
    protected $auto = ['valid', 'ip', 'ua'];

    public function activity()
    {
        return $this->belongsTo("Activities", "activity_id");
    }

    protected function setValidAttr($value = 0)
    {
        return +$value ? 1 : 0;
    }

    protected function setIpAttr($value = "")
    {
        return $value ?: request()->ip();
    }

    protected function setUaAttr($value = "")
    {
        return $value ?: request()->server("HTTP_USER_AGENT");
    }

    protected function scopeNormal($query)
    {
        /** @var Checkin $query */
        return $query->where(['valid' => 1]);
    }
}