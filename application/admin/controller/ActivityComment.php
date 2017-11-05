<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-21 21:25:31
 */

namespace app\admin\controller;

use app\admin\controller\traits\delete;
use app\common\model\ActivitiesComment as ActivitiesCommentModel;

/**
 * 活动评价
 * Class ActivityComment
 * @package app\admin\controller
 */
class ActivityComment extends base
{
    protected $Model = ActivitiesCommentModel::class;

    use delete;

    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $ActivitiesComment = new ActivitiesCommentModel();
        $list = $ActivitiesComment->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}