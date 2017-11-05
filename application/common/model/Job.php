<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-06 19:45:50
 */

namespace app\common\model;

use app\common\model\traits\ip;
use think\Model;
use think\Request;

class Job extends Model
{
    use ip;

    protected $auto = ['status'];
    protected $autoWriteTimestamp = true;
    protected $type = [
        'create_time' => 'timestamp',
        'update_time' => 'timestamp',
    ];

    protected function setStatusAttr()
    {
        return +Request::instance()->request("status") ? 1 : 0;
    }

    public function apply()
    {
        return $this->hasMany("JobApplications", "job_id");
    }
}