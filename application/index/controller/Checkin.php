<?php

namespace app\index\controller;

use app\common\model\Blacklist as BlacklistModel;
use think\db\Query;
use think\Request;
use app\common\model\Activities as ActivitiesModel;
use app\common\model\Checkin as CheckinModel;

class Checkin extends base
{
    /**
     * 显示资源列表
     *
     * @param $hash
     * @return \think\Response
     */
    public function index($hash)
    {
        $DES = new \OpenSSL();
        $hash = urldecode($hash);
        $hash = str_replace(" ", "+", $hash);
        $hash = $DES->decrypt($hash);
        list($activity, $time) = explode(",", $hash);
        ($activity && $time) || $this->error("参数错误");

        $end_time = strtotime("next Monday", $time);
        $start_time = $end_time - 3600 * 24 * 7;

        (time() < $start_time || time() > $end_time) && $this->error("签到已过期");
        $Model = new ActivitiesModel();
        $activity = $Model::get($activity);
        if ($activity['pause'] || !$activity) $this->error("没有找到进行中的活动");
        $ass['activity'] = $activity['id'];
        $Model = new ActivitiesModel();
        $_list = $Model::scope("display")->select();
        $ass['_activities_list'] = $_list;
        $this->assign($ass);
        if (input("lang") == "en") return $this->fetch("index_english");
        else return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     */
    public function save(Request $request)
    {
        $hash = $request->request("hash");
        $DES = new \OpenSSL();
        $hash = urldecode($hash);
        $hash = str_replace(" ", "+", $hash);
        $hash = $DES->decrypt($hash);
        list($activity, $time) = explode(",", $hash);
        ($activity && $time) || $this->error("参数错误");

        $verify = session("checkin");
        if ($verify && $verify - time() <= 3600) $this->error("您已经签到过咯！<br>PS:不要帮别人签到哦！");
        $data = $request->post();
        $data['activity_id'] = $activity;
        $data['valid'] = 1;
        $Model = new CheckinModel();
        if (BlacklistModel::scope("normal")->getByStuNo($data['stu_no'])) $this->error("系统拒绝了您的签到。请联系活动负责人处理。");
        $where['create_time'] = [["gt", strtotime(date("Y-m-d"))], ["lt", strtotime(date("Y-m-d")) + 3600 * 24]];
//        $where['ip'] = $request->ip();
        $where['ua'] = $request->server('HTTP_USER_AGENT');
        $result = $Model::get(function (Query $query) use ($where) {
            return $query->where($where);
        });
        if (($result)) $this->error("您已经签到过咯！<br>PS:不要帮别人签到哦！");

        $result = $Model->allowField(true)->validate(true)->save($data);
        if ($result === false) $this->error($Model->getError());
        session("checkin", time());
        $this->success("签到成功！");
    }

    public function getInfo($stu_no)
    {
        $Model = new CheckinModel();
        $_info = $Model->getByStuNo($stu_no);
        $this->success($_info);
    }
}
