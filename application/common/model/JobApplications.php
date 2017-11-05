<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-06 20:34:00
 */

namespace app\common\model;

use think\Model;
use think\Request;

class JobApplications extends Model
{
    protected $auto = ['ip'];
    protected $autoWriteTimestamp = true;
    protected $type = [
        'create_time' => "timestamp",
        'update_time' => "timestamp",
    ];

    protected function setIpAttr()
    {
        return Request::instance()->ip();
    }

    protected function getStatusTextAttr()
    {
        $status = +$this->getAttr("status");
        switch ($status) {
            case 0:
                $status = "等待审核";
                break;
            case 1:
                $status = "已阅";
                break;
            case 2:
                $status = "通过";
                break;
            case 3:
                $status = "已修改";
                break;
            case -1:
                $status = "已被拒绝";
                break;
            case -2:
                $status = "已取消";
                break;
        }
        return $status;
    }

    public function job()
    {
        return $this->belongsTo("Job", "job_id");
    }
}