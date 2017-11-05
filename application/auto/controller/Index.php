<?php

namespace app\auto\controller;

use app\auto\model\Generate;
use app\auto\model\Table;
use think\Request;

class Index extends base
{
    public function index()
    {
        $this->title = "数据库列表";
        $query = Table::getDatabaseList();
        $_list = $query;
        $this->assign("_databases", $_list);
        return $this->fetch();
    }

    public function database(Request $request, $name)
    {
        $this->title = "数据库 {$name} 中的数据表";
        $tables = Table::getTableList($name);
        $this->assign("_tables", $tables);
        return $this->fetch();
    }

    public function table(Request $request, $table, $database)
    {
        $this->title = "数据库 {$database} 中 {$table} 表的字段信息";
        $tables = Table::getColumnList($table, $database);

        $prefix = explode("_", $table)[0] . "_";
        $table = [
            'prefix' => $prefix,
            'name' => str_replace($prefix, "", $table),
        ];
        $this->assign("_columns", $tables);
        $this->assign("_table", $table);
        $this->assign("_template", Generate::instance()->getTemplateList());
        return $this->fetch();
    }

    public function generate(Request $request)
    {
        $this->title = "生成结果";
        $curd = $request->request('', null, null);
        $Generate = Generate::instance();
        $result = $Generate->saveCURD($curd);
        $error = $Generate->getError();
        $this->assign("_result", $result);
        $this->assign("_error", $error);
        $this->assign("_files", $Generate->getFilesList());
        return $this->fetch();
    }

    public function preview(Request $request)
    {
        $this->title = "预览CURD代码";
        $options = $request->request();
        $Generate = Generate::instance($options);
        $preview = $Generate->generateCURD();
        $this->assign("_curd", $preview);
        return $this->fetch();
    }
}
