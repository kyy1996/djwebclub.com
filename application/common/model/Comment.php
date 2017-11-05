<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-06 22:29:12
 */

namespace app\common\model;

use think\db\Query;
use think\Model;
use think\Request;
use traits\model\SoftDelete;

class Comment extends Model
{
    use SoftDelete;
    protected $auto = ['ip', 'mobile'];
    protected $autoWriteTimestamp = true;
    protected $readonly = [
        "create_time", "ip"
    ];
    protected $type = [
        "create_time" => "datetime",
        "update_time" => "datetime",
        "delete_time" => "datetime",
    ];

    protected function setIpAttr()
    {
        return Request::instance()->ip();
    }

    protected function setMobileAttr($mobile = null)
    {
        return $mobile ?: "";
    }

    public function reply()
    {
        return $this->hasMany("Comment", "parent_id");
    }

    protected function scopeTop(Query $query)
    {
        return $query->where(['parent_id' => 0])->order("create_time DESC");
    }
}