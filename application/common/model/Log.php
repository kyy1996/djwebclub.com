<?php

namespace app\Common\model;

use think\db\Query;
use think\Model;
use think\Request;

class Log extends Model
{
    protected $auto = ['ip', 'status'];
    protected $autoWriteTimestamp = true;
    protected $type = [
        'create_time' => "timestamp",
        'update_time' => "timestamp"
    ];

    public function log($uid, $url, $description, $module, $param_id)
    {
        $data = compact("uid", "url", "description", "module");
        return $this->validate(true)->save($data);
    }

    public function getByUid($uid)
    {
        $map = ['uid' => $uid];
        return static::all($map);
    }

    protected function scopeValid($query)
    {
        /** @var Query $query */
        $where = ['status' => 1];
        $query->where($where);
    }

    protected function setIpAttr($value = "")
    {
        return Request::instance()->ip();
    }

    protected function setStatusAttr($value = 1)
    {
        return $value ? 1 : 0;
    }
}
