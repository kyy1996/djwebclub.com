<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/1/30
 * Time: 16:15
 */

namespace app\auto\model;


use think\Db;

class Table
{
    const DATABASE = 'information_schema';
    const TABLE_LIST = 'tables';
    const COLUMN_LIST = 'columns';

    public static function getDatabaseList()
    {
        return Db::query("SELECT TABLE_SCHEMA AS 'database', COUNT(TABLE_NAME) as count FROM information_schema.tables WHERE `TABLE_SCHEMA` NOT IN ('performance_schema','information_schema') GROUP BY TABLE_SCHEMA;");
    }

    public static function getTableList($database)
    {
        $where = [
            'TABLE_SCHEMA' => $database
        ];
        return Db::table("information_schema.tables")->where($where)->field("TABLE_SCHEMA AS 'database',TABLE_NAME AS 'name',TABLE_COMMENT AS 'comment',ENGINE AS 'engine'")->select();
    }

    public static function getColumnList($table, $database = "")
    {
        $sql = "SHOW FULL COLUMNS FROM $table";
        if ($database) $sql .= " FROM {$database}";
        return Db::query($sql);
    }
}