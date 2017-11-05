<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/1/15
 * Time: 10:31
 */
return [
    'template' => [
        'layout_on' => false,
        'layout_name' => 'layout'
    ],
    //视图模板替换字符串
    'view_replace_str' => [
        '__STATIC__' => \think\Request::instance()->root() . '/static',
        '__JS__' => \think\Request::instance()->root() . '/Admin/js',
        '__CSS__' => \think\Request::instance()->root() . '/Admin/css',
        '__IMG__' => \think\Request::instance()->root() . '/Admin/images',
    ],
    // 默认输出类型
    'default_return_type' => 'html',
];