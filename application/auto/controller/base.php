<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/1/30
 * Time: 23:12
 */

namespace app\auto\controller;


class base extends \app\admin\controller\base
{
    protected $title = "自动代码生成工具";
    protected $description = "";

    protected function fetch($template = '', $vars = [], $replace = [], $config = [])
    {
        $this->assign("_title", $this->title);
        $this->assign("_description", $this->description);
        return parent::fetch($template, $vars, $replace, $config);
    }
}