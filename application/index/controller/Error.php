<?php

namespace app\index\controller;

use think\Response;

class Error extends base
{
    public function index()
    {
        return Response::create($this->fetch("error/index"), 'html', 404);
    }
}
