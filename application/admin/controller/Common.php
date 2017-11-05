<?php

namespace app\admin\controller;

use app\common\model\Common as CommonModel;
use think\Request;

/**
 * 全局设置
 * Class Common
 * @package app\admin\controller
 */
class Common extends base
{
    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $Common = new CommonModel();
        $_config = $Common::getCommon();

        $this->assign("_config", $_config);
        return $this->fetch();
    }

    /**
     * 修改
     * @param Request $request
     */
    public function update(Request $request)
    {
        $Common = new CommonModel();
        $all = $request->request();
        if (!$Common::updateCommon($all)) $this->error("配置项不存在");
        $this->success("操作成功");
    }
}
