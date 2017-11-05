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
    protected $title = '{controller.title}';
    protected $model = '{namespace}\model\{model}';
    
    use 
    
    /**
     * 显示资源列表
     * @return \think\Response
     */
    public function index()
    {
        ${model} = new {model}Model();
        $list = ${model}::paginate(20);
        $this->assign("_list", $list);
        return $this->fetch();
    }
    
    
    public function update(Request $request, ${key} = 0)
    {
        $Model = new {model}Model();
        if ($id && !$Model = $Model::get(${key})) {
            $this->error("数据不存在");
        }
        $result = $Model->validate(true)->save($request->request());
        if ($result === false) $this->error("操作失败：" . $Model->getError());
        $this->success("操作成功");
    }

    public function delete(Request $request, ${key}s)
    {
        if (!is_array(${key}s)) ${key}s = explode(",", ${key}s);
        if (!${key}s) $this->error("参数错误");

        $Model = new {model}Model();
        foreach (${key}s as ${key}) {
            $result = $Model::get(${key});
            $result && $result = $result->delete();
            if ($result === false) $this->error("操作失败：" . $Model->getError());
        }
        $this->success("操作成功");
    }
}
CONTROLLER;
echo $tpl;
