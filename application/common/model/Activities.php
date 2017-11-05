<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-05 22:38:50
 */

namespace app\common\model;

use think\db\Query;
use think\Model;
use traits\model\SoftDelete;

class Activities extends Model
{
    use SoftDelete;
    protected $auto = ['hide', 'pause',];
    protected $autoWriteTimestamp = true;
    protected $readonly = [
        "create_time", "ip",
    ];
    protected $type = [
        "create_time" => "datetime",
        "update_time" => "datetime",
        "delete_time" => "datetime",
    ];

    public function checkin()
    {
        return $this->hasMany("Checkin", "activity_id");
    }

    public function timetable($list = [])
    {
        $timetable = [];
        $list      = $list ?: static::scope("display")->select();
        foreach ($list as $item) {
            $week                      = mb_substr($item->time, 0, 2);
            $time                      = mb_substr($item->time, 2);
            $timetable[$week][$time][] = $item;
        }

        return $timetable;
    }

    public function signup()
    {
        return $this->hasMany("Signup", "activity_id");
    }

    protected function setHideAttr()
    {
        return request()->request('hide') ? 1 : 0;
    }

    protected function setPauseAttr($pause = 0)
    {
        return request()->request('pause') ? 1 : 0;
    }

    protected function scopeNormal(Query $query)
    {
        $map = [
            'pause' => 0,
        ];

        return $query->where($map);
    }

    protected function scopeDisplay(Query $query)
    {
        $map = [
            "hide" => 0,
        ];

        return $this->scopeNormal($query)->where($map);
    }
}