<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: relation
 * Time: 2017-02-21 21:31:03
 */

namespace app\common\model;

use think\Model;
use think\Request;
use traits\model\SoftDelete;

class ActivitiesComment extends Model
{
    use SoftDelete;

    protected $auto = ['ip', 'uid'];
    protected $type = [
        'create_time' => "timestamp",
        'update_time' => "timestamp"
    ];
    protected $readonly = [
        'activity_id', 'uid'
    ];
    protected $autoWriteTimestamp = true;

    protected function setIpAttr()
    {
        return Request::instance()->ip();
    }

    protected function setUidAttr()
    {
        $user = is_login();
        return $user ? $user['uid'] : 0;
    }

    public function activity()
    {
        return $this->belongsTo(Activities::class, "activity_id");
    }

    public function user()
    {
        return $this->belongsTo(Member::class, "uid", "uid");
    }
}