<?php

namespace app\common\model;

use think\db\Query;
use think\Loader;
use think\Model;
use think\Request;

class Menu extends Model
{
    protected static $Tree = [];
    protected static $Menus = [];

//    protected $auto = ["hide", "status"];

    protected static function init()
    {
        $menu = static::all(function (Query $query) {
            $query->order("sort", "DESC")->order("id", "ASC");
        });
        $menus = $menu->toArray();
        static::$Menus = $menus;
        static::$Tree = list2tree($menus);
    }

    public function getTree($all = true)
    {
        if ($all) return static::$Tree;
        static $visible_tree = [];
        if (!$visible_tree) {
            $visible_tree = list2tree($this->getMenu($all));
        }
        return $visible_tree;
    }

    public function getMenu($all = true)
    {
        if ($all) return static::$Menus;
        static $visible_menus = [];
        if (!$visible_menus) {
            foreach (static::$Menus as $menu) {
                if ($menu['status'] && !$menu['hide'])
                    $visible_menus[] = $menu;
            }
        }
        return $visible_menus;
    }

    public function getParents($id)
    {
        $items = [];
        $item = $this->getMenuItem($id);
        $parent = $item;
        do {
            $items[$parent['id']] = $parent;
        } while ($parent = $this->getMenuItem($parent['pid']));
        return array_reverse($items);
    }

    public function getMenuItem($value, $type = "id")
    {
        $current = false;
        foreach (static::$Menus as $menu) {
            if (strtolower($menu[$type]) == strtolower($value)) {
                $current = $menu;
            }
        }
        return $current;
    }

    public function getNavigationInfo()
    {
        $current = $this->getMenuItem($this->getCurrentUri(), "url");
        $navigation_tree = $this->getTree(false);
        $navigation_menu = $this->getMenu(false);
        $breadcrumb = $this->getParents($current['id']);
        $title = [];
        foreach (array_reverse($breadcrumb) as $item) {
            $title[] = $item['title'];
        }
        $info = [
            'current' => $current,
            'tree' => $navigation_tree,
            'menu' => $navigation_menu,
            'breadcrumb' => $breadcrumb,
            'title' => $title
        ];
        return $info;
    }

    public function getCurrentUri()
    {
        $module = Request::instance()->module();
        $controller = Loader::parseName(Request::instance()->controller(), 0);
        $action = Request::instance()->action();
        return $module . "/" . $controller . "/" . $action;
    }

    protected function setStatusAttr()
    {
        if (Request::instance()->has("status")) return 1;
        else return 0;
    }

    protected function setHideAttr()
    {
        if (Request::instance()->has("hide")) return 1;
        else return 0;
    }
}