<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/1/15
 * Time: 10:31
 */
return [
    'view_replace_str' => [
        '__STATIC__' => \think\Request::instance()->root() . '/static',
        '__JS__' => \think\Request::instance()->root() . '/Home/js',
        '__CSS__' => \think\Request::instance()->root() . '/Home/css',
        '__IMG__' => \think\Request::instance()->root() . '/Home/images',
    ]
];