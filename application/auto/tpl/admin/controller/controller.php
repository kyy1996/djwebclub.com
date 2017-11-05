<?php
$tpl = <<<'CONTROLLER'
<?php
/**
 * Created by Webmaster CURD Generator
 * Version: {version}
 * Type: {type}
 * Time: {time}
 */

namespace {namespace}\controller;

use app\admin\controller\base;
use app\admin\controller\traits\curd;
use {namespace}\model\{model} as {model}Model;
use think\Request;

class {controller.name} extends base
{
    protected $Model = '{namespace}\model\{model}';
    
    use curd;
    
    /**
     * 显示资源列表
     * @return \think\Response
     */
    public function index()
    {
        ${model} = new {model}Model();
        $list = ${model}->paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
}
CONTROLLER;
echo $tpl;
