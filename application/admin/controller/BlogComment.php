<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-26 00:37:51
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\BlogComment as BlogCommentModel;

/**
 * 博文评论
 * Class BlogComment
 * @package app\admin\controller
 */
class BlogComment extends base
{
    protected $Model = BlogCommentModel::class;

    use curd;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $BlogComment = new BlogCommentModel();
        $list = $BlogComment->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}