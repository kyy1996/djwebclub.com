<?php

namespace app\index\controller;

use app\common\model\ActivitiesComment as ActivitiesCommentModel;
use think\Request;

class ActivityComment extends base
{
    /**
     * 显示资源列表
     */
    public function index()
    {
        $this->success($this->fetch());
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     */
    public function save(Request $request)
    {
        $Model = new ActivitiesCommentModel();
        $result = $Model->allowField(true)->validate(true)->save($request->request());
        if ($result === false) $this->error("操作失败：" . $Model->getError());
        $this->success("我们已收到您的反馈，感谢您的支持！");
    }
}
