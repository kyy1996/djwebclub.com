<?php

namespace app\index\controller;

use app\common\model\Activities as ActivitiesModel;

class Activity extends base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $Model = new ActivitiesModel();
        $where = [];
        if ($type = input("type"))
            $where['type'] = $type;
        if ($time = input("time"))
            $where['time'] = $time;
        if ($location = input("location"))
            $where['location'] = $location;
        if ($host = input("host"))
            $where['host'] = $host;
        $_list = $Model::scope("display")->where($where)->paginate(20);

        $_category_list = $Model::scope("display")->where($where)->field("type, count(*) as count")->group("type")->select();
        $_time_list = $Model::scope("display")->where($where)->field("time, count(*) as count")->group("time")->select();
        $_location_list = $Model::scope("display")->where($where)->field("location, count(*) as count")->group("location")->select();
        $_host_list = $Model::scope("display")->where($where)->field("host, count(*) as count")->group("host")->select();
        $_sum_list = $Model::scope("display")->select()->toArray();

        foreach ($_sum_list as $key => $item) {
            $_sum_list[$key]['activity'] = $item;
        }

        $ass['_sum_list'] = $_sum_list;
        $ass['_category_list'] = $_category_list;
        $ass['_time_list'] = $_time_list;
        $ass['_location_list'] = $_location_list;
        $ass['_host_list'] = $_host_list;
        $ass['_list'] = $_list;
        $this->assign($ass);
        return $this->fetch();
    }
}
