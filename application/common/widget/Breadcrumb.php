<?php

/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/1/20
 * Time: 21:21
 */

namespace app\common\widget;

class Breadcrumb extends base
{
    public function show($breads = [])
    {
        $ass = [
            "breads" => $breads
        ];
        $this->fetch("breadcrumb/show", $ass);
    }
}