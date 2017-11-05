<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-22 00:31:14
 */

namespace app\common\model;

use think\Model;

class Seo extends Model
{
    protected $auto = [];

    public function getParam()
    {
        return $this->column("value", "name");
    }
}