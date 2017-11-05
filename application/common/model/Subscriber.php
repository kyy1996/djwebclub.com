<?php

namespace app\common\model;

use think\Model;

class Subscriber extends Model
{
    protected $autoWriteTimestamp = true;

    protected $auto = [
        "uid"
    ];

    protected $type = [
        "create_time" => "timestamp",
        "update_time" => "timestamp"
    ];

    protected function setUidAttr()
    {
        return is_login() ? is_login()['uid'] : 0;
    }
}
