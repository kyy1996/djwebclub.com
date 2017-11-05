<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: controller
 * Time: 2017-02-04 21:59:28
 */

namespace app\admin\controller;

use app\common\model\Statistic as StatisticModel;

/**
 * 统计信息
 * Class Statistic
 * @package app\admin\controller
 */
class Statistic extends base
{
    /**
     * 首页
     * @param string $controller
     * @param string $module
     * @param string $ua
     * @param string $param_id
     * @return \think\Response
     */
    public function index($controller = "", $module = "", $ua = "", $param_id = "")
    {
        $map = [];
        if ($controller) {
            $map['controller'] = $controller;
        }
        if ($module) {
            $map['module'] = $module;
        }
        if ($ua) {
//            $ua = str_replace("%", "\\%", $ua);
            $map['ua'] = ['like', "%$ua%"];
        }

        if ($param_id !== "") {
            $map['param_id'] = $param_id;
        }
        $Statistic = new StatisticModel();
        $count = $Statistic->where($map)->count();
        $this->assign("_count", $count);

        $list = $Statistic->where($map)->order("time DESC")->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}