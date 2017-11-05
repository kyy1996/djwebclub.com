<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-04 21:59:28
 */

namespace app\common\model;

use app\common\model\traits\ip;
use think\Model;

/**
 * Class Statistic
 * @method static integer count($field = "*")
 * @method static $this where($where, $op = null, $condition = null)
 * @package app\common\model
 */
class Statistic extends Model
{
    use ip;

    protected $auto = [];

    protected $type = [
        'time' => "timestamp"
    ];

    protected function getUaTextAttr($ua = "")
    {
        return get_ua($ua ?: $this->getAttr("ua"));
    }

    protected function getRefererTextAttr($referer = "")
    {
        if (strpos($referer ?: $this->getAttr("referer"), $_SERVER['HTTP_HOST'])) return "<span>本站</span>";
        else return "<span class='text-warning'>外站</span>";
    }

    public function visitCount()
    {
        /*return $this->where("referer", "notlike", 'http%://' . Request::instance()->server("SERVER_NAME") . '%')
            ->whereOr("referer", "null")
            ->whereOr("referer", "")->count();*/
        $url = "http://piwik.kyy1996.com/index.php?module=API&method=API.get&idSite=1&period=day&date=yesterday&format=JSON&token_auth=855b27fd2eec65f884821f4c3f27444e";
        $default = '{"nb_uniq_visitors":0,"nb_visits":0,"nb_users":0,"nb_actions":0,"max_actions":0,"bounce_count":0,"sum_visit_length":0,"nb_visits_returning":0,"nb_actions_returning":0,"nb_uniq_visitors_returning":0,"nb_users_returning":0,"max_actions_returning":0,"bounce_rate_returning":"0%","nb_actions_per_visit_returning":0,"avg_time_on_site_returning":0,"nb_conversions":0,"nb_visits_converted":0,"revenue":0,"conversion_rate":"0%","nb_conversions_new_visit":0,"nb_visits_converted_new_visit":0,"revenue_new_visit":0,"conversion_rate_new_visit":"0%","nb_conversions_returning_visit":0,"nb_visits_converted_returning_visit":0,"revenue_returning_visit":0,"conversion_rate_returning_visit":"0%","nb_pageviews":0,"nb_uniq_pageviews":0,"nb_downloads":0,"nb_uniq_downloads":0,"nb_outlinks":0,"nb_uniq_outlinks":0,"nb_searches":0,"nb_keywords":0,"bounce_rate":"0%","nb_actions_per_visit":0,"avg_time_on_site":0}';
        return json_decode(@file_get_contents($url) ?: $default, true);
    }
}