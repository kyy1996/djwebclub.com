<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-09 16:21:09
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Blog as BlogModel;
use app\common\model\Category;

/**
 * 部落格
 * Class Blog
 * @package app\admin\controller
 */
class Blog extends base
{
    protected $Model = BlogModel::class;

    use curd;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $Blog = new BlogModel();
        $list = $Blog->with("user")->order("create_time", "DESC")->paginate(20);
        $this->assign("_list", $list);

        $category = Category::getCategories(Category::TYPE_BLOG);
        $this->assign("_categories_list", $category);
        return $this->fetch();
    }

    protected function dataGetTrigger(array $data)
    {
        $data['content'] = html_entity_decode($data['content']);
        return $data;
    }
}