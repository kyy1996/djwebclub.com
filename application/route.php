<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::domain("www", "index");

Route::get("", "index/index/index");

Route::miss("index/Error/index");

foreach (["api", "admin", 'index', 'auto', 'oauth'] as $module) {
    Route::any("{$module}/:controller/:action", "{$module}/:controller/:action");
}

Route::group(["domain" => "www"], function () {
    Route::get("blog/show/id/:id", function ($id) {
        return redirect("blog/$id");
    });
    Route::get("blog/:id", "index/blog/read");
    Route::any(':controller/:action', 'index/:controller/:action');
});

Route::group(["domain" => "admin"], function () {
    Route::get("/", "admin/index/index");
});

Route::get(["BlogRead", 'blog/:id'], 'index/Blog/read');


return [
    '__pattern__' => [
        'name' => '\w+',
        'id' => '\d+',
    ],
];
