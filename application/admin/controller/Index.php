<?php

namespace app\admin\controller;

use app\common\model\Activities;
use app\common\model\Blog;
use app\common\model\Checkin;
use app\common\model\Member;
use app\common\model\Statistic;
use think\db\Query;

/**
 * 控制台概览
 * Class Index
 * @package app\admin\controller
 */
class Index extends base
{
    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $_statistic_count = Statistic::count();
        $_user_count = Member::count();
        $_blog_count = Blog::count();
        $_activity_count = Activities::scope("normal")->count();
        $_statistic_chart = Statistic::scope("normal")->select(function (Query $query) {
            return $query->limit(0, 31)->order("time DESC")->group("from_unixtime(time, \"%Y%m%d\")")->field("COUNT(*) as count,from_unixtime(time, \"%Y-%m-%d\") AS date");
        });
        $_checkin_count = Checkin::scope("normal")->count();
        $_checkin_chart_query = Checkin::scope("normal")->with("activity")->select(function (Query $query) {
            return $query->limit(0, 20)->order("create_time DESC")->group("from_unixtime(`create_time`, \"%Y%m%d\")")->field("COUNT(*) as count,from_unixtime(`create_time`, \"%Y-%m-%d\") AS date,activity_id");
        });
        $_checkin_chart = [];
        foreach ($_checkin_chart_query as $item) {
            $checkin = [
                'activity' => $item->date . " " . $item->activity->name,
                'count' => $item->count
            ];
            $_checkin_chart[] = $checkin;
        }

        $_checkin_rank_chart_query = Checkin::scope("normal")->with("activity")->select(function (Query $query) {
            return $query->group("activity_id")->field("activity_id, COUNT(*) as count")->order("COUNT(*) DESC");
        });
        $_checkin_rank_chart = [];
        foreach ($_checkin_rank_chart_query as $item) {
            $checkin = [
                'activity' => $item->activity->host . "的" . $item->activity->name,
                'count' => $item->count
            ];
            $_checkin_rank_chart[] = $checkin;
        }
        $_statistic_chart = array_reverse($_statistic_chart->toArray());
        $_checkin_chart = array_reverse($_checkin_chart);
        $ass = compact("_statistic_count", "_user_count", "_blog_count", "_activity_count", "_statistic_chart", "_checkin_count", "_checkin_chart", "_checkin_rank_chart");
        $this->assign($ass);
        return $this->fetch();
    }
}
