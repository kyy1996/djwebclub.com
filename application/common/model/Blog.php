<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-09 16:21:09
 */

namespace app\common\model;

use app\common\model\traits\ip;
use think\Model;
use think\Request;
use traits\model\SoftDelete;

/**
 * Class Blog
 * @method static integer count($field = "*")
 * @package app\common\model
 */
class Blog extends Model
{
    use SoftDelete;
    use ip;

    const STATUS_HIDE = 1;
    const STATUS_TOP = 2;

    protected $auto = ['hide', 'ip'];
    protected $type = [
        'delete_time' => "timestamp",
        'create_time' => "timestamp",
        'update_time' => "timestamp",
    ];

    protected $autoWriteTimestamp = true;

    protected function scopeNormal()
    {
        return $this->where("hide", 0);
    }

    protected function setHideAttr($value = "")
    {
        return +Request::instance()->request("hide") ? 1 : 0;
    }

    /*protected function getReadCountAttr()
    {
        return count($this->getAttr("statistic"));
    }*/

    protected function getCommentCountAttr()
    {
        return count($this->getAttr("comments"));
    }

    protected function getBriefAttr()
    {
        return get_short_content(htmlentities(strip_tags(\Parsedown::instance()->parse(html_entity_decode($this->getAttr('content'))))));
    }

    public function user()
    {
        return $this->belongsTo(Member::class, "uid", "uid");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "class", 'id');
    }

    public function statistic()
    {
        return $this->hasMany(Statistic::class, "param_id")->where(["controller" => "Blog", "action" => ["in", ["show", "read"]]]);
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function nextBlog()
    {
        return $this->find(function () {
            return $this->where("id", ">", $this->getAttr("id"))->order("id", "DESC");
        });
    }

    public function previousBlog()
    {
        return $this->find(function () {
            return $this->where("id", "<", $this->getAttr("id"))->order("id", "DESC");
        });
    }
}