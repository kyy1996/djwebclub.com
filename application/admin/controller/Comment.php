<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-06 22:29:12
 */

namespace app\admin\controller;

use app\admin\controller\traits\curd;
use app\common\model\Comment as CommentModel;

/**
 * 评论管理
 * Class Comment
 * @package app\admin\controller
 */
class Comment extends base
{
    protected $Model = CommentModel::class;

    use curd;

    /**
     * 首页
     * @return \think\Response
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $Comment = new CommentModel();
        $list    = $Comment->paginate(20);
        $this->assign("_list", $list);

        return $this->fetch();
    }
}