<?php

namespace app\index\controller;

use app\common\model\Blog as BlogModel;
use think\Controller;
use think\Request;

class BlogComment extends Controller
{
    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     */
    public function save(Request $request)
    {
        $data = $request->only(["blog_id", "parent_id", "email", "mobile", "nickname", "content"]);
        $Model = BlogModel::get($request->request("blog_id"));
        if (!$Model) $this->error("文章不存在");
        $result = $this->validate($data, \app\common\validate\BlogComment::class);
        if ($result !== true) $this->error($result);

        $result = $Model->comments()->save($data);
        if ($result === false) $this->error($Model->getError());

        $this->success("操作成功。感谢您的关注");
    }
}
