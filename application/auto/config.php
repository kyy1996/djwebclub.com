<?php
//配置文件
return [
    'view_replace_str' => [
        '__STATIC__' => \think\Request::instance()->root() . '/static',
        '__JS__' => \think\Request::instance()->root() . '/Admin/js',
        '__CSS__' => \think\Request::instance()->root() . '/Admin/css',
        '__IMG__' => \think\Request::instance()->root() . '/Admin/images',
    ],
    'input_type' => [
        'text' => [
            'title' => '文本域',
            'options' => 'length,pattern',
            'default' => ''
        ],
        'password' => [
            'title' => '密码域',
            'options' => 'length,pattern',
            'default' => ''
        ],
        'hidden' => [
            'title' => '隐藏域',
            'options' => '',
            'field' => [
                'Key' => 'PRI'
            ]
        ],
    ],
];