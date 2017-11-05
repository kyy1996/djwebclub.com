<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 数据集转树数组
 * @param array|ArrayAccess $list
 * @param string            $id
 * @param string            $pid
 * @param string            $child
 * @param int               $root
 * @return array
 */
function list2tree($list, $id = "id", $pid = "pid", $child = "_child", $root = 0)
{
    ($list instanceof \think\Collection) && $list = $list->toArray();
    ($list instanceof \think\Paginator) && $list = $list->getCollection()->toArray();
    $refer = [];
    //转换为id数组
    foreach ($list as $key => $item) {
        $refer[$item[$id]] = &$list[$key];
    }
    $tree = [];
    //构造树
    foreach ($list as $key => $item) {
        if ($item[$pid] == $root) {
            //根节点
            $tree[$item[$id]] = &$list[$key];
        } else {
            if (key_exists($item[$pid], $refer)) {
                $refer[$item[$pid]][$child][] = &$list[$key];
            }
        }
    }

    return $tree;
}

/**
 * 树数组转有序列表，可标识层级数
 * @param array  $tree 树数组
 * @param string $child 子项目索引
 * @param string $level 层级数
 * @param int    $current 递归层级树
 * @return array
 */
function tree2list($tree, $child = "_child", $level = "_level", $current = 0)
{
    if (!is_array($tree)) return [];
    $list = [];
    foreach ($tree as $item) {
        $base_count = $current;
        $level && $item[$level] = $base_count;
        $child_items = [];
        if (key_exists($child, $item)) $child_items = $item[$child];
        $item[$child] = [];

        $list[] = $item;
        $list = array_merge($list, tree2list($child_items, $child, $level, $base_count + 1));
    }

    return $list;
}

/**
 * 树数组转指定层级树
 * @param array  $tree 树数组
 * @param int    $depth 最大深度
 * @param string $child 子项索引
 * @return array
 * @internal param int $current 当前层级
 */
function tree2tree($tree, $depth = 1, $child = "_child")
{
    $result = &$tree;
    if ($depth <= 0) $result = tree2list($result, $child, '');
    else
        foreach ($tree as &$item) {
            if (key_exists($child, $item))
                $item[$child] = tree2tree($item[$child], $depth - 1, $child);
            else $item[$child] = [];
        }

    return $result;
}

function is_login()
{
    $user = session("alen_admin_auth");
    $user = json_decode($user, true);
    if (!$user) return false;

    return $user;
}

/**
 * 解释User-Agent
 * @param $user_agent
 * @return string
 */
function get_ua($user_agent)
{
    $ua = [
        'platform' => '电脑',
        'os'       => 'Linux',
        'browser'  => 'Webkit',
        'network'  => 'Unknown'
    ];

    $mobile = ['ndroid', 'ipad', 'iphone', 'itouch', 'windows phone', 'symbian', 'blackberry'];
    foreach ($mobile as $item)
        if (stripos($user_agent, $item)) {
            $ua['platform'] = "手机";
            break;
        }
    $mobile = ['iPad', 'iPhone', 'iTouch', 'Windows Phone'];
    foreach ($mobile as $item)
        if (stripos($user_agent, $item)) {
            $ua['platform'] = $item;
            break;
        }
    if ($pos = stripos($user_agent, "windows")) {
        $e_pos = stripos($user_agent, ";", $pos);
        $ua['os'] = substr($user_agent, $pos, $e_pos - $pos);

        $reg = "/(Windows NT [_\d\.]+)/i";
        $os = [];
        if (preg_match($reg, $user_agent, $os))
            $ua['os'] = $os[1];
    } else if ($pos = stripos($user_agent, "android")) {
        $e_pos = stripos($user_agent, ";", $pos);
        $ua['os'] = substr($user_agent, $pos, $e_pos - $pos);
    } else if (stripos($user_agent, "symbian")) {
        $ua['os'] = "塞班";
    } else if (stripos($user_agent, "blackberry")) {
        $ua['os'] = "黑莓";
    } else if (stripos($user_agent, "Mac OS X")) {
        $ua['os'] = "Mac OS";
    } else if (stripos($user_agent, "Ubuntu")) {
        $ua['os'] = "Ubuntu";
    } else if (stripos($user_agent, "Centos")) {
        $ua['os'] = "CentOS";
    } else if (stripos($user_agent, "Deepin")) {
        $ua['os'] = "Deepin Linux";
    } else if (stripos($user_agent, "linux")) {
        $ua['os'] = "Linux";
    }

    $reg = "/\([\s; ]*([\w ]+);*\)/i";
    $os = [];
    if (preg_match($reg, $user_agent, $os))
        $ua['os'] = $os[1];

    if (strripos($user_agent, "spider") !== false) $ua['browser'] = "爬虫";
    else if (strripos($user_agent, "MQQBrowser") !== false) $ua['browser'] = "QQ浏览器";
    else if (strripos($user_agent, "MicroMessenger") !== false) $ua['browser'] = "微信浏览器";
    else if (stripos($user_agent, "applewebkit")) {
        if (stripos($user_agent, "android") !== false) {
            $ua['browser'] = "内置浏览器";
        } else if (stripos($user_agent, "Chrome")) {
            $ua['browser'] = "Chrome";
        } else {
            $ua['browser'] = "Safari";
        }
    } else if (stripos($user_agent, "webkit")) {
        $ua['browser'] = "Chrome";
    } else {
        $ua['browser'] = "其他浏览器";
    }

    if (stripos($user_agent, "MSIE")) {
        $ua['browser'] = "IE";
    }
    if ($pos = strripos($user_agent, "nettype") !== false) {
        $reg = "/NetType\/(\w+)\s.+/i";

        $network = [];
        preg_match($reg, $user_agent, $network);

        //查询网络类型
        $ua['network'] = $network[1];
    } else {
        unset($ua['network']);
    }

    if (stripos($user_agent, "wget") !== false) {
        $ua['browser'] = "WGET";
    }

    if (stripos($user_agent, "yunguance") !== false) {
        $ua['browser'] = "百度云观测";
    }

    if (stripos($user_agent, "python") !== false) {
        $ua['browser'] = "Python";
    }

    if (stripos($user_agent, "php") !== false) {
        $ua['browser'] = "PHP";
    }

    if (stripos($user_agent, "firefox") !== false) {
        $ua['browser'] = "火狐浏览器";
    }

    if (stripos($user_agent, "bot") !== false || stripos($user_agent, "spider") !== false) {
        $ua['browser'] = "";
        if (stripos($user_agent, "google") !== false) $ua['browser'] = "谷歌";
        if (stripos($user_agent, "baidu") !== false) $ua['browser'] = "百度";
        if (stripos($user_agent, "sogou") !== false) $ua['browser'] = "搜狗";
        if (stripos($user_agent, "yunguance") !== false) $ua['browser'] = "百度云观测";
        $ua['browser'] .= "爬虫";
    }

    return implode("-", $ua);
}


function get_ip_location($ip)
{
    $Data = new \IpLocation();
    $result = $Data->getlocation($ip);
    array_walk($result, function (&$value) {
        $value = iconv("GB2312//IGNORE", "UTF-8//IGNORE", $value);
    });

    return $result;
}

/**
 * 递归建立多级目录
 * @param $dir
 * @return bool
 */
function mkdirs($dir)
{
    if (!is_dir($dir)) {
        if (!mkdirs(dirname($dir))) {
            return false;
        }
        if (!mkdir($dir, 0777)) {
            return false;
        }
    }

    return true;
}

/**
 * 递归删除目录
 * @param $dir
 */
function rmdirs($dir)
{
    $d = dir($dir);
    while (false !== ($child = $d->read())) {
        if ($child != '.' && $child != '..') {
            if (is_dir($dir . '/' . $child)) rmdirs($dir . '/' . $child);
            else unlink($dir . '/' . $child);
        }
    }
    $d->close();
    rmdir($dir);
}

/**
 * 切割文章为短文章，并加上省略号
 * @param string $content
 * @param int    $len
 * @param bool   $hasDot
 * @return mixed|string
 */
function get_short_content($content, $len = 200, $hasDot = true)
{
    $content = trim($content);
    $str_len = mb_strlen($content, "utf-8");
    $content = mb_substr($content, 0, $len, "utf-8");
    $content = str_replace("\n", "", $content);
    $content = str_replace("\r", "", $content);
    if ($hasDot && $str_len > $len) $content .= "…";

    return $content;
}

/**
 * 得到学院名称
 * @param $school_id
 * @return string
 */
function get_school($school_id)
{
    $schools = [
        1 => "电气学院",
        2 => "机械学院",
        3 => "电子信息学院",
        4 => "商学院",
        6 => "外国语学院",
        8 => "汽车学院"
    ];
    return (string)@$schools[intval($school_id)];
}

function get_school_class($stu_no = 0)
{
    $class_list = get_class_list();
    $index = substr($stu_no, 2, 7);
    $class = @$class_list[$index] ?: "";
    if ($class) {
        $class .= substr($stu_no, 0, 2);
        $class .= $stu_no[2];
        $class .= $stu_no[9];
    }
    return $class;
}

/**
 * 解析学号
 * @param $stu_no
 * @return array
 */
function parse_stu_no($stu_no)
{
    //解析年级
    $grade = "20" . substr($stu_no, 0, 2);
    //解析类型
    $type = substr($stu_no, 2, 1) === 1 ? "本科" : "专科";
    //解析学院
    $school = intval(substr($stu_no, 4, 2));
    $school = get_school($school);
    //解析班级
    $class = get_school_class($stu_no);
    return compact("grade", "type", "school", "class");
}

function get_class_list()
{
    static $class_list = null;
    if (!$class_list) {
        $class_list = collection(\app\common\model\ClassNo::all())->column('class', 'no');
    }
    return $class_list;
}