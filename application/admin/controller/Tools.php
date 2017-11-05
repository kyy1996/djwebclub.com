<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;

/**
 * 数据表结构
 * Class Tools
 * @package app\admin\controller
 */
class Tools extends Controller
{
    /**
     * 显示数据表结构
     * @return mixed
     */
    public function structure()
    {
        $menu = $this->showMenu();
        $this->assign('tabarr', $menu['tabarr']);
        $this->assign('tabstr', $menu['tabstr']);
        $list = $this->showTable($menu['tabarr']);
        $this->assign('liststr', $list);
        return $this->fetch();
    }

    /**
     * 显示菜单
     * @return array
     */
    public function showMenu()
    {
        $result = Db::query("show table status");
        $tabarr = array();
        $tabstr = '';
        $zbs = 0;
        $xbs = 0;
        foreach ($result as $key => $row) {
            $zbs++;
            if (strpos($row["Comment"], '[DEL]') === false) {
                $xbs++;
                $tabarr[] = $row;
                $rowname = $row['Name'];
                $Comment = $row["Comment"] ?: $rowname;
                $tabstr .= '<li id="me_' . $rowname . '"><a href="javascript:scroll_fun(\'' . $rowname . '\');">' . $xbs . '.' . $Comment . '</a></li>';
            }
        }
        $tabstr .= '<li>共' . $zbs . '张表（含隐藏' . ($zbs - $xbs) . '张表）</li>';
        return array('tabarr' => $tabarr, 'tabstr' => $tabstr);
    }

    /**
     * 显示数据表信息
     * @param $tabarr
     * @return string
     */
    public function showTable($tabarr)
    {
        $retstr = '';
        foreach ($tabarr as $key => $value) {
            $rowname = $value['Name'];
            $Comment = $value["Comment"];
            $retstr .= '<tr>';
            $retstr .= '<td class="biaotou" id="td_' . $rowname . '"><ul class="tableName"><li class="commName">' . $Comment . '<span class="line">>>>>></span><a name="' . $rowname . '"></a></li><li class="tabName">' . $rowname . '</li></ul>';
            $retstr .= '<ul class="op"><li>生成</li><li><a href="javascript:select_func(\'' . $rowname . '\');">查询</a><a href="javascript:insert_func(\'' . $rowname . '\');">插入</a><a href="javascript:update_func(\'' . $rowname . '\');">更新</a><a href="javascript:delete_func(\'' . $rowname . '\');">删除</a></li><li>语句</li></ul></td>';
            $retstr .= '</tr>';

            $re2 = Db::query("SHOW FULL FIELDS FROM " . $rowname);
            if ($re2) {
                $retstr .= '<tr><td class="tdbody"><table cellspacing="0" cellpadding="0" border="0" id="' . $rowname . '" class="databody">';
                $retstr .= '<tr><th class="fiel">字段</th><th class="type">类型</th><th class="comm">注解</th></tr>';
                //用while循环依次输出表头
                $fid = 0;
                //while($field = $Model -> fetch_array( $re2 )){
                foreach ($re2 as $k => $field) {
                    $bz = '';
                    if ($field['Extra'] == 'auto_increment') {
                        $bz = '<span class="zdbh">自动编号</span>';
                    }
                    if ($field['Key'] != '') {
                        $bz .= '<span class="zj">(主键)</span>';
                    }
                    $Comment = $field['Comment'];
                    $trclass = '';
                    if (strpos($Comment, '[DEL]') !== false) {
                        $trclass = ' class="grey"';
                    }
                    $retstr .= '<tr' . $trclass . '>';
                    $retstr .= '<td class="fiel">' . $field['Field'] . '</td><td class="type">' . $field['Type'] . '</td><td class="comm">' . $Comment . $bz . '</td>';
                    $retstr .= "</tr>";
                    $fid++;
                }
                $retstr .= '</table></td></tr><tr><td class="xline"></td></tr>';
            }
        }
        return $retstr;
    }
}