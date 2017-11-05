<?php

namespace app\index\controller;

use app\common\model\Comment as CommentModel;
use think\Request;

class Comment extends base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $Model        = new CommentModel();
        $_list        = $Model->paginate(20);
        $ass['_list'] = $_list;
        $this->assign($ass);

        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @throws \think\exception\HttpResponseException
     * @return void
     */
    public function save(Request $request)
    {
        if (!$request->isPost()) $this->error('非法访问');
        $data = $request->post();
        if (true !== $result = $this->validate($data, \app\common\validate\Comment::class)) $this->error("操作失败：$result");
        $Model  = new CommentModel();
        $result = $Model->allowField(true)->save($data);
        $result === false && $this->error("操作失败：" . $Model->getError());
        $this->success("操作成功");
    }
}
