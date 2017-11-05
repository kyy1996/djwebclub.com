<?php

namespace app\admin\controller;

use app\common\model\About;
use app\common\model\BannerText;
use app\common\model\Common as CommonModel;
use think\Request;

/**
 * 页面管理
 * Class Page
 * @package app\admin\controller
 */
class Page extends base
{
    /**
     * 首页
     * @return \think\Response
     */
    public function index()
    {
        $Common = new CommonModel();
        $Banner = new BannerText();
        $banner_text = $Banner::all();
        $_info = $Common::getCommon();
        $this->assign("_info", $_info);
        $this->assign("_banner_text", $banner_text);
        return $this->fetch();
    }

    /**
     * 更新首页
     * @param Request $request
     */
    public function updateIndex(Request $request)
    {
        $data = $request->request();
        if (!$this->update($data)) $this->error("操作失败");
        $this->success("操作成功");
    }

    /**
     * 更新Banner
     * @param Request $request
     * @param int $id
     */
    public function updateBanner(Request $request, $id = 0)
    {
        $Model = new BannerText();
        $id && $Model = $Model::get($id);
        if (!$Model) $this->error("数据不存在");
        $result = $Model->save($request->request());
        if ($result === false) $this->error("操作失败，" . $Model->getError());
        $this->success("操作成功");
    }

    /**
     * 删除Banner
     * @param Request $request
     * @param $id
     */
    public function delBanner(Request $request, $id)
    {
        $Model = new BannerText();
        $result = $Model::destroy($id);
        if ($result === false) $this->error("操作失败，" . $Model->getError());
        $this->success("操作成功");
    }

    /**
     * 联系我们
     * @return mixed
     */
    public function contact()
    {
        $Common = new CommonModel();
        $_config = $Common::getCommon();
        $this->assign("_config", $_config);
        return $this->fetch();
    }

    /**
     * 更新联系我们页面
     * @param Request $request
     */
    public function updateContact(Request $request)
    {
        if (!$this->update($request->request())) $this->error("操作失败");
        $this->success("操作成功");
    }

    /**
     * 关于我们
     * @return mixed
     */
    public function about()
    {
        $About = new About();
        $_info = $About::getCommon();
        $this->assign("_info", $_info);
        return $this->fetch();
    }

    /**
     * 更新关于页面
     * @param Request $request
     */
    public function updateAbout(Request $request)
    {
        $data = $request->request();
        $data["team_list"] = $this->combine($data['team']);
        $data["advance_list"] = $this->combine($data['advance']);
        if (!$this->update($data)) $this->error("操作失败");
        $this->success("操作成功");
    }

    /**
     * 更新设置
     * @param $data
     * @return bool
     */
    protected function update($data)
    {
        $Common = new CommonModel();
        return $Common::updateCommon($data);
    }

    /**
     * 合并数组
     * @param array $array
     * @return array
     */
    protected function combine(array $array)
    {
        $return = [];
        $key = array_keys($array);
        $values = array_values($array);
        while ($values && $values[0]) {
            $row = [];
            foreach ($values as &$value)
                $row[] = array_shift($value);
            $return[] = array_combine($key, $row);
        }
        return $return;
    }
}
