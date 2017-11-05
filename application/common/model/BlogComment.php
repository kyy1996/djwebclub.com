<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-26 00:37:51
 */

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class BlogComment extends Model
{
    use SoftDelete;
    protected $auto = ['ip', 'uid'];
    protected $autoWriteTimestamp = true;
    protected $type = [
        'create_time' => 'timestamp',
        'update_time' => 'timestamp',
    ];

    protected function blog()
    {
        return $this->belongsTo(Blog::class, "blog_id");
    }

    protected function setIpAttr()
    {
        return request()->ip();
    }

    protected function setUidAttr()
    {
        return is_login() ? is_login()['uid'] : 0;
    }
}