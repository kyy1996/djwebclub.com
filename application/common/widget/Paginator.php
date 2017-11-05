<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/11/1
 * Time: 14:39
 */

namespace app\common\widget;


class Paginator extends base {
    public function show($data = []) {
        $ass = [
            '_list' => $data,
        ];
        $this->fetch("paginator/show", $ass);
    }
}