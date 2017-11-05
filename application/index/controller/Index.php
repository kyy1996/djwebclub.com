<?php

namespace app\index\controller;

use app\common\model\About as AboutModel;
use app\common\model\Activities as ActivitiesModel;
use app\common\model\BannerText as BannerTextModel;
use app\common\model\Blog as BlogModel;
use app\common\model\Common as CommonModel;
use app\common\model\Gallery as GalleryModel;
use think\db\Query;

class Index extends base
{
    public function index()
    {
        $Model = new BannerTextModel();
        $_banner_list = $Model->order("`index` ASC, time DESC")->select();
        $ass['_banner_list'] = $_banner_list;
        $_gallery_list = GalleryModel::all(function (Query $query) {
            $query->limit(0, 10);
        });
        $ass['_gallery_list'] = $_gallery_list;
        $_blog_list = BlogModel::all(function (Query $query) {
            return $query->limit(0, 4)->order("create_time DESC");
        });
        $ass['_blog_list'] = $_blog_list;
        $_info = AboutModel::getCommon();
        $ass['_history'] = $_info;
        $Model = new ActivitiesModel();
        $_activities_timetable = $Model->timetable();
        $ass['_activities_list'] = $_activities_timetable;
        $this->assign($ass);
        return $this->fetch();
    }

    public function about()
    {
        $_info = AboutModel::getCommon();
        $ass['_info'] = $_info;
        $_info = CommonModel::getCommon();
        $ass['_contact'] = $_info;
        $this->assign($ass);
        return $this->fetch();
    }
}
