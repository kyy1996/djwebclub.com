<?php

namespace app\index\controller;

use think\Config;
use think\Controller;
use app\common\model\Statistic as StatisticModel;
use app\common\model\Seo as SeoModel;
use app\common\model\Common as CommonModel;
use think\exception\HttpResponseException;
use think\View as ViewTemplate;
use think\Response;

class base extends Controller
{
    /**
     * 用户数据
     * @var null|\stdClass
     */
    protected $user = null;

    // 初始化
    protected function _initialize()
    {
        $this->user = is_login();
        $this->assign(['_user' => $this->user]);
        $Model  = new CommonModel();
        $common = $Model->getCommon();
        $this->assign("_common", $common);
        $Model = new SeoModel();
        $seo   = $Model->getParam();
        $this->assign("_seo", $seo);

        //        $this->assign("_visit_count", 1147302);
        $Model       = new StatisticModel();
        $visit_count = $Model->visitCount();
        array_walk($visit_count, function (&$value, $key) {
            $value = in_array($key, ["nb_visits", "nb_uniq_visitors"]) ? 1147302 + $value : $value;
        });
        $this->assign("_visit_count", $visit_count);

        /*$session = session("visited");
        if (!$session) $session = [];
        $value = request()->module() . "\\" . request()->controller() . "\\" . request()->action() . "\\" . intval(input("id"));
        if (!in_array($value, $session)) {
            $session[] = $value;
            session("visited", $session);

            $map['ip'] = request()->ip();
            $map['uid'] = intval($this->user['uid']);
            $map['param_id'] = intval(input("id"));
            $map['module'] = request()->module();
            $map['controller'] = request()->controller();
            $map['action'] = request()->action();
            $map['time'] = time();
            $map['ua'] = substr(request()->server('HTTP_USER_AGENT'), 0, 250);
            $map['referer'] = request()->server('HTTP_REFERER', '');
            $Model = new StatisticModel();
            $Model::create($map);
        }*/
    }

    public function _empty()
    {
        return action("index/error/index");
    }

    protected function error($msg = '', $url = null, $data = '', $wait = 3, array $header = [])
    {
        if (request()->isAjax()) {
            parent::error($msg, $url, $data, $wait, $header);
        }

        $code = 0;
        if (is_numeric($msg)) {
            $code = $msg;
            $msg  = '';
        }
        if (is_null($url)) {
            $url = 'javascript:history.back(-1);';
        } else if ('' !== $url) {
            $url = (strpos($url, '://') || 0 === strpos($url, '/')) ? $url : url($url);
        }
        $result = [
            'code' => $code,
            'msg'  => $msg,
            'data' => $data,
            'url'  => $url,
            'wait' => $wait,
        ];

        $result   = ViewTemplate::instance(Config::get('template'), Config::get('view_replace_str'))
                                ->fetch(Config::get('dispatch_error_tmpl'), $result);
        $response = Response::create($result, 'html', 404)->header($header);
        throw new HttpResponseException($response);
    }
}
