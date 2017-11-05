<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-02-04 22:24:40
 */

namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected $auto = ["pid"];

    const TYPE_BLOG = "Blog";
    const TYPE_GALLERY = "Gallery";

    protected function scopeBlog()
    {
        return $this->where("type", self::TYPE_BLOG);
    }

    protected function scopeGallery()
    {
        return $this->where("type", self::TYPE_GALLERY);
    }

    public function items($type = "")
    {
        return $this->hasMany($type ?: $this->getAttr("type"), "class");
    }

    public function blog()
    {
        return $this->items(static::TYPE_BLOG);
    }

    public function gallery()
    {
        return $this->items(static::TYPE_GALLERY);
    }

    public static function getCategories($type)
    {
        $map = [
            'type' => $type
        ];
        return static::all($map);
    }

    protected function setPidAttr($value = 0)
    {
        return +$value;
    }
}