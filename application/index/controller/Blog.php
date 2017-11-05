<?php

namespace app\index\controller;

use app\common\model\Category;

use app\common\model\Blog as BlogModel;
use app\common\model\Category as CategoryModel;

class Blog extends base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $BlogModel = new BlogModel();
        $_class_list = $BlogModel->field(['FROM_UNIXTIME(create_time,"%Y%m") AS date',
            'FROM_UNIXTIME(create_time,"%Y") AS year',
            'FROM_UNIXTIME(create_time,"%m") AS month',
            'FROM_UNIXTIME(create_time,"%d") AS day',
            'count(*) AS `count`'])->group("FROM_UNIXTIME(create_time,\"%Y%m\")")->select();
        $this->assign("_time_list", $_class_list);
        $Model = new CategoryModel();
        $_category_list = $Model::scope(CategoryModel::TYPE_BLOG)->with("blog")->select();
        $this->assign("_category_list", $_category_list);

        $where = [];
        //过滤器
        if ($time = input("time")) {
            $year = intval(substr($time, 0, 4));
            $month = intval(substr($time, -2));
            $start_time = mktime(0, 0, 0, $month, 1, $year);
            $end_time = mktime(0, 0, 0, $month + 1, 1, $year);
            $where['create_time'] = ["between", "{$start_time},{$end_time}"];
        }
        if ($class = input("class")) $where['class'] = $class;
        $_list = $BlogModel::scope("normal")->with("user,comments")->where($where)->order("create_time DESC")->paginate(20);
        $ass['_list'] = $_list;
        $this->assign($ass);
        return $this->fetch();
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        $_info = null;
        +$id == $id && $_info = BlogModel::get($id);
        if (!$_info) $this->error("文章不存在");
        //阅读量计数器
        $blog_read = session("blog_read") ?: [];
        if (!isset($blog_read[$id])) {
            $blog_read[$id] = 1;
            session("blog_read", $blog_read);
            $_info->where(["id" => $id])->setInc("read_count");
            $_info['read_count'] += 1;
        }
        $_info['content'] = htmlentities(\Parsedown::instance()->parse(html_entity_decode($_info['content'])));
        $ass['_info'] = $_info;
        $this->assign($ass);
        return $this->fetch();
    }
}
