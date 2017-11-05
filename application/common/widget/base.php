<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/1/20
 * Time: 21:37
 */

namespace app\common\widget;


use think\Controller;
use think\View;

abstract class base extends Controller
{
    abstract public function show($data = []);

    final protected function fetch($template = '', $vars = [], $replace = [], $config = [])
    {
        $name = $template ?: __CLASS__;
        $path = str_replace("app\\", str_replace(getcwd(), "", APP_PATH), __NAMESPACE__);
        $path = substr($path, 1);
        $path = str_replace("\\", DS, $path);
        $tpl_path = $path . DS . $name . ".html";
        $this->view->engine->layout(false);
        $View = new View();
        echo $View->fetch($tpl_path, $vars);
    }
}