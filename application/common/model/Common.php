<?php

namespace app\common\model;

use think\Model;

class Common extends Model
{
    protected static $config = [];

    protected static function init()
    {
        $list = static::column("value", "name");
        foreach ($list as &$item) {
            if (@json_decode($item, true)) $item = json_decode($item, true);
        }
        static::$config = $list;
    }

    public static function getCommon($name = null)
    {
        if (!static::$config) static::init();
        if ($name === null) return static::$config;
        if (!key_exists($name, static::$config)) return false;
        return static::$config[$name];
    }

    public static function updateCommon($name, $value = null)
    {
        if (is_array($name)) {
            foreach ($name as $key => $value)
                static::updateCommon($key, $value);
        } else {
            if (!key_exists($name, static::$config) || static::$config[$name] === $value) return false;
            if (!is_string($value)) $value = json_encode($value);
            $data = [
                'name' => $name,
                'value' => $value
            ];
            if (static::update($data)) static::$config[$name] = $value;
        }
        return true;
    }
}
