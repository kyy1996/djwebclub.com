<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/2/10
 * Time: 20:05
 */

namespace app\api\controller;

class System extends base
{
    public function getStatus()
    {
        $status = getrusage();
        $this->success("读取成功", null, $status);
    }
}