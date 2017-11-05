<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class MemberProfile extends Model
{
    use SoftDelete;

    protected $autoWriteTimestamp = true;

    protected $type = [
        "create_time" => "datetime",
        "update_time" => "datetime",
        "delete_time" => "datetime",
    ];

    protected $readonly = ['uid', "create_time", "update_time", "delete_time"];

    public function member()
    {
        return $this->belongsTo(Member::class, "uid", "uid");
    }

    public function checkin()
    {
        return $this->hasMany(Checkin::class, "stu_no", "stu_no")->where("name", "<>", "");
    }

    public function signup()
    {
        return $this->hasMany(Signup::class, "stu_no", "stu_no")->where("name", "<>", "");
    }

    public function jobs()
    {
        return $this->hasMany(JobApplications::class, "stu_no", "stu_no")->where("name", "<>", "");
    }
}
