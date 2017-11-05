<?php

namespace app\admin\controller;

use think\Loader;
use think\Request;

/**
 * 反射器
 * Class Reflection
 * @package app\admin\controller
 */
class Reflection extends base
{
    /**
     * 显示反射模型
     * @param Request $request
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $module = $request->request('module', 'admin');
        $class_list = $this->getControllerList($module);
        $ass = [
            '_class' => $class_list,
            '_module' => $module
        ];
        $this->assign($ass);
        return $this->fetch();
    }

    /**
     * 生成菜单与权限节点
     * @param Request $request
     * @return mixed
     */
    public function generateMenu(Request $request)
    {
        if ($request->isAjax()) {
            //写入数据库
            $nodeList = collection($request->post('node/a'));
            $data = $nodeList->filter(function ($item) {
                return isset($item['enable']);
            });
            $validator = new \app\common\validate\Menu();
            $data->each(function ($item, $i) use ($validator, $data) {
                if (!$validator->check($item)) $this->error("{$i}# 数据出错：" . $validator->getError(), null, $item);
                $uri = $item['uri'];
                $hide = $item['hide'] ?? 0;
                unset($item['uri']);
                unset($item['enable']);
                unset($item['hide']);
                $item['url'] = $uri;
                $item['hide'] = $hide;
                $data[$i] = $item;
            });
            $result = (new \app\common\model\Menu)->insertAll($data->toArray());
            $this->success("操作成功，写入了{$result}条数据");
        }
        $module = $request->request('module', 'admin');
        $classList = $this->getControllerList($module);
        if (!$classList) $this->error('模块' . $module . '不存在');

        $nodeList = [];
        foreach ($classList as $controller) {
            $node = [
                'name' => trim($controller['name']),
                'title' => trim($controller['comment'][0]),
                'uri' => $module . '/' . Loader::parseName($controller['name'], 0),
                'methods' => []
            ];
            foreach ($controller['methods'] as $method) {
                if ($method['visibility'] !== 'public' || strpos(trim($method['name']), '_') === 0) continue;
                $item['name'] = trim($method['name']);
                $item['title'] = trim($method['comment'][0]);
                $item['uri'] = $node['uri'] . '/' . $method['name'];
                $item['status'] = 0;
                if ((new \app\common\model\Menu)->getMenuItem($item['uri'], 'url')) $item['status'] = 1;//已存在
                $node['methods'][] = $item;
            }
            $nodeList[] = $node;
        }

        $menu = tree2list((new \app\common\model\Menu)->getTree());

        $this->assign('_menu', $menu);
        $this->assign('_module', $module);
        $this->assign('_node', $nodeList);
        return $this->fetch();
    }

    /**
     * 校验各节点是否存在
     * @param Request $request
     * @return mixed
     */
    public function generateDatabase(Request $request)
    {
        $module = $request->request('module', 'admin');
        $menuList = \app\common\model\Menu::where(['module' => $module])->select()->toArray();
        $existList = $this->getControllerList($module);
        $nodeList = [];
        $node = [
            'title' => '数据库',
            'name' => 'database',
            'methods' => []
        ];
        foreach ($menuList as $item) {
            list($module_name, $controller_name, $action) = explode('/', $item['url']);
            $item['status'] = 0;
            $item['name'] = basename(str_replace('\\', DS, $item['url']));
            $item['uri'] = $item['url'];
            $item['visibility'] = 'public';
            $item['status'] = 0;
            foreach ($existList as $controller) {
                if (Loader::parseName($controller['name'], 0) !== $controller_name) continue;
//                $item['title'] = $controller['title'];
                foreach ($controller['methods'] as $method) {
                    if (strtolower($method['name']) !== strtolower($action)) continue;
                    $item['status'] = 1;
                }
            }
            $node['methods'][] = $item;
        }
        $nodeList[] = $node;
        $menu = tree2list((new \app\common\model\Menu)->getTree());
        $this->assign('_menu', $menu);
        $this->assign('_module', $module);
        $this->assign('_node', $nodeList);
        return $this->fetch();
    }

    /**
     * 修改/删除节点数据
     * @param Request $request
     */
    public function modifyMenu(Request $request)
    {
        $nodeList = $request->request('node/a');
        $count = 0;
        foreach ($nodeList as $node_id => $data) {
            $result = false;
            isset($data['delete']) && $data['delete'] && $result = \app\common\model\Menu::destroy($node_id);
            isset($data['update']) && $data['update'] && $result = \app\common\model\Menu::update($node_id);
            if ($result) $count++;
        }
        $this->success("操作成功，影响了{$count}条数据。");
    }

    /*public function convertMenu()
    {
        $menu = \app\common\model\Menu::all();
        $menu->each(function ($item) {
            list($module, $controller, $action) = explode('/', $item->url);
            $controller = Loader::parseName($controller, 0);
            $item->url = $module . '/' . $controller . '/' . $action;
            $item->save();
        });
    }*/

    /**
     * 得到指定模块的控制器方法列表
     * @param string $module
     * @return array|bool
     */
    protected function getControllerList($module = 'admin')
    {
        $controller_reflector = new \ReflectionClass("\\think\\Controller");
        $directory = APP_PATH . $module . DS . "controller";
        if (!is_dir($directory)) return false;
        $list = dir($directory);

        $class_list = [];
        while ($filename = $list->read()) {
            if (is_dir($directory . DS . $filename) || !is_file($directory . DS . $filename)) continue;
            $class_name = explode(".", $filename)[0];

            $class_name = 'app\\' . $module . '\\controller\\' . $class_name;
            if (!class_exists($class_name)) continue;

            //反射
            $reflection = new \ReflectionClass($class_name);

            $class = [
                'name' => $reflection->getShortName(),
                'comment' => $this->commentAnalyze($reflection->getDocComment())
            ];

            $properties = [];
            foreach ($this->reflectionDiff($reflection->getProperties(), $controller_reflector->getProperties()) as $item) {
                $property = [];
                $comment = [''];

                /** @var \ReflectionProperty $item */
                is_scalar($item->getDocComment()) && $comment = $this->commentAnalyze($item->getDocComment());
                $property['comment'] = $comment;

                $visibility = '';
                if ($item->isProtected())
                    $visibility = "protected";
                if ($item->isPublic())
                    $visibility = "public";
                if ($item->isPrivate())
                    $visibility = "private";

                $property['visibility'] = $visibility;
                $property['name'] = $item->name;
                $properties[] = $property;
            }

            $methods = [];
            foreach ($this->reflectionDiff($reflection->getMethods(), $controller_reflector->getMethods()) as $item) {
                /** @var \ReflectionMethod $item */
                $method = [];
                $comment = [''];

                is_scalar($item->getDocComment()) && $comment = $this->commentAnalyze($item->getDocComment());
                $method['comment'] = $comment;

                $visibility = '';
                if ($item->isProtected())
                    $visibility = "protected";
                if ($item->isPublic())
                    $visibility = "public";
                if ($item->isPrivate())
                    $visibility = "private";

                $method['visibility'] = $visibility;

                $method['parameters'] = $item->getParameters();

                $method['name'] = $item->name;

                $methods[] = $method;
            }

            $class['methods'] = $methods;
            $class['properties'] = $properties;
            $class_list[] = $class;
        }
        return $class_list;
    }

    /**
     * 取AB的差集
     * @param $a
     * @param $b
     * @return mixed
     */
    private function reflectionDiff($a, $b)
    {
        foreach ($a as $key => $reflection) {
            foreach ($b as $k2 => $reflection2) {
                if ($reflection->name == $reflection2->name) {
                    unset($a[$key]);
                    break;
                }
            }
        }
        return $a;
    }

    /**
     * 注释分析
     * @param string $comment
     * @return array
     */
    protected function commentAnalyze($comment)
    {
        $comments = explode("\n", $comment);
        array_pop($comments);
        array_shift($comments);
        foreach ($comments as $key => $comment) {
            $comments[$key] = trim(str_replace("* ", "", $comment));
        }
        $comments = $comments ?: [''];
        return $comments;
    }
}
