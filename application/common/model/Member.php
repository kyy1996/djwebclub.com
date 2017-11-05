<?php

namespace app\common\model;

use app\common\model\traits\ip;
use think\Model;
use think\Request;

/**
 * Class Member
 * @method static integer count($field = "*")
 * @package app\common\model
 */
class Member extends Model
{
    use ip;

    const LOGIN_USER_NOT_EXIST = -1;
    const LOGIN_INVALID_PASSWORD = -2;
    const LOGIN_INVALID_STATUS = 0;

    protected $pk = "uid";
    protected $autoWriteTimestamp = true;
    protected $type = [
        'create_time' => 'timestamp',
        'update_time' => 'timestamp'
    ];
    protected $auto = ['status'];

    //用户登录态session名称
    protected $authSessionName = "alen_admin_auth";
    //默认头像
    protected $defaultAvatar = "/Admin/images/user-4.png";

    /*protected $relationWrite = [
        'stu_no', 'name', 'class', 'school'
    ];*/

    protected function setStatusAttr($status = 0)
    {
        $status = $status ?: Request::instance()->param("status");
        if (intval($status)) return 1;
        else return 0;
    }

    protected function getAvatarAttr($value = "")
    {
        return $value ?: $this->defaultAvatar;
    }

    protected function getUserGroupIdAttr()
    {
        return $this->getAttr("userGroups")->column('id');
    }

    /**
     * @return \think\model\relation\BelongsToMany
     */
    public function userGroups()
    {
        return $this->belongsToMany("AuthGroup", "auth_group_access", "group_id", "uid");
    }

    public function login($username, $password)
    {
        $Model = $this->findUser($username);

        if (!$Model) {
            $this->error = "用户{$username}不存在";

            return static::LOGIN_USER_NOT_EXIST;
        }
        $where['password'] = $password;
        if ($Model->password !== $password) {
            $this->error = "密码错误";

            return static::LOGIN_INVALID_PASSWORD;
        }
        if ($Model->status <= 0) {
            $this->error = "用户状态异常";

            return static::LOGIN_INVALID_STATUS;
        }

        return $this->softLogin($Model) ? $Model->uid : false;
    }

    public function findUser($username)
    {
        $Model = null;
        if (strpos($username, "+") === 0) {
            //手机号登录
            $Model = static::get(["mobile" => $username], "profile");
        } else if (substr_count($username, "@") == 1) {
            //E-Mail登录
            $where['email'] = $username;
            $Model          = static::get($where, "profile");
        } else {
            //手机号或uid登录
            $map['uid']    = $username;
            $map['mobile'] = $username;
            $Model         = static::with("profile")->whereOr($map)->find();
            if (!$Model) {
                //学号登录
                $Model = MemberProfile::get(["stu_no" => $username]);
                if ($Model) $Model = static::get($Model->uid, "profile");
            }
        }

        return $Model;
    }

    /**
     * 软登录
     * @param Member|integer $uid
     * @return bool
     */
    public function softLogin($uid)
    {
        if ($uid instanceof $this) {
            $Model = $uid;
        } else {
            $Model = static::get($uid, "profile");
            if (!$Model) return false;
        }
        $Model = static::get($Model->uid, "profile");
        $user  = $Model->visible(["uid", "email", "mobile", "avatar", "type", "school", "stu_no", "class", "name",
                                  "admin"])->toArray();
        $user['user_groups'] = $Model->user_groups->toArray();
        session($this->authSessionName, json_encode($user));

        return true;
    }

    /**
     * 注销账户
     * @return bool
     */
    public function logout()
    {
        session($this->authSessionName, null);

        return true;
    }

    public function profile()
    {
        return $this->hasOne(MemberProfile::class, "uid", "uid")->bind("stu_no,school,class,name");
    }

    public function jobs()
    {
        //        return $this->hasManyThrough(JobApplications::class, MemberProfile::class, "uid", "stu_no", "uid");
        return $this->profile->jobs();
    }

    public function checkin()
    {
        //        return $this->hasManyThrough(Checkin::class, MemberProfile::class, "a", "stu_no", "uid");
        return $this->profile->checkin()->where("valid", 1);
    }

    public function signup()
    {
        return $this->profile->signup();
    }

    public function activities()
    {
        return Activities::all(["id", "in",
                                implode(",", $this->signup->column("activity_id"))])->sort(function ($a, $b) {
            return get_week(mb_substr($a->time, 0, 2)) > get_week(mb_substr($b->time, 0, 2));
        });
    }
}
