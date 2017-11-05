<?php

namespace app\auto\controller;


use app\auto\model\Generate as GenerateModel;
use app\auto\model\Table;
use think\Request;

class Generate extends base
{
    public function model()
    {
        $this->title = "模型生成器";
        $this->description = "自动生成关联模型代码";
        $Model = new Table();
        $this->assign("_databases", $Model::getDatabaseList());
        return $this->fetch();
    }

    public function generate(Request $request, $database, $table, $relation, $auto = false, $timestamp = false, $template = "default", $readonly = null)
    {
        $Generate = new GenerateModel();
        $data = compact("database", "table", "relation", "auto", "timestamp", "template", "readonly");
        $result = $Generate->generateRelationModel($data);
        if ($result === false) $this->error("操作失败：" . $Generate->getError());
        $this->success("操作成功", null, $result);
    }

    public function getTableList(Request $request, $database)
    {
        $Model = new Table();
        $list = $Model::getTableList($database);
        if (!$list) $this->error("操作失败");
        $this->success("操作成功", null, $list);
    }

    public function getColumnList(Request $request, $table)
    {
        $Model = new Table();
        $list = $Model::getColumnList($table);
        if (!$list) $this->error("操作失败");
        $this->success("操作成功", null, $list);
    }

    public function save(Request $request)
    {
        $Generate = new GenerateModel();
        $path = $request->request("path", null, null);
        $content = $request->request("content", null, null);
        $curd = [
            "_generate" => ['relation'],
            "relation" => [
                'path' => $path,
                "content" => $content
            ]
        ];
        if (!$Generate->saveCURD($curd)) $this->error("操作失败：" . $Generate->getError());
        $this->success("操作成功");
    }
}