<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/1/31
 * Time: 12:46
 */

namespace app\auto\model;


use think\Loader;

class Generate
{
    protected static $template_root;
    protected static $template_path;
    protected static $app_root;
    protected static $module_path;
    protected static $options = ["key" => "", "field" => [], "column" => [], "module" => [], "model" => "", "controller" => ["name" => "", "title" => ""], "template" => "", "layout" => ["status" => true]];

    protected $errorMsg = "";
    protected $fileList = [];

    public function __construct($options = [])
    {
        static::$template_root = dirname(__DIR__) . DS . "tpl";
        static::$app_root = realpath(APP_PATH);
        if ($options) {
            static::$options = array_merge(static::$options, array_intersect_key($options, static::$options));
            static::$module_path = static::$app_root . DS . static::$options['module']['name'];
            static::$template_path = $this->getTemplatePath();
            static::$options['key'] = static::$options['key'] ?: "id";
            static::$options['layout']['status'] = key_exists("status", static::$options['layout']) ? !!static::$options['layout']['status'] : false;
            $this->parseField();
        }
    }

    public static function instance($options = [])
    {
        return new static($options);
    }

    public function getTemplateList()
    {
        $template = [];
        if (is_dir(static::$template_root))
            foreach (scandir(static::$template_root) as $dir)
                if ($dir != "." && $dir != "..")
                    if (is_dir(static::$template_root . DS . $dir))
                        $template[] = $dir;
        return $template;
    }

    public function generateCURD()
    {
        $template_path = $this->getTemplatePath();
        if (!$template_path) return false;
        return [
            "view" => [
                'generate' => true,
                "name" => "index." . config("template.view_suffix"),
                "label" => "视图",
                "path" => static::$module_path . DS . "view" . DS . strtolower(static::$options['controller']['name']) . DS . "index." . config("template.view_suffix"),
                "content" => $this->generate("view", "body")
            ],
            "controller" => [
                'generate' => true,
                "name" => $this->generateNamespace("controller") . "\\" . ucfirst(static::$options['controller']['name']),
                "label" => "控制器",
                'title' => static::$options['controller']['title'],
                "path" => static::$module_path . DS . "controller" . DS . ucfirst(static::$options['controller']['name']) . EXT,
                "content" => $this->generate("controller")
            ],
            "model" => [
                'generate' => true,
                "name" => $this->generateNamespace("model") . "\\" . ucfirst(static::$options['model']),
                "label" => "模型",
                "path" => static::$module_path . DS . "model" . DS . ucfirst(static::$options['model']) . EXT,
                "content" => $this->generate("model")
            ],
            "validate" => [
                'generate' => true,
                "name" => $this->generateNamespace("validate") . "\\" . ucfirst(static::$options['model']),
                "label" => "验证器",
                "path" => static::$module_path . DS . "validate" . DS . ucfirst(static::$options['model']) . EXT,
                "content" => $this->generate("validate")
            ],
            "config" => [
                'generate' => false,
                "name" => "config" . EXT,
                "label" => "模块配置文件",
                "path" => static::$module_path . DS . "config" . EXT,
                "content" => $this->generate("config")
            ],
        ];
    }

    public function generateRelationModel($option)
    {
        if (strpos($option['table'], ".") !== false) $option['table'] = explode(".", $option['table'])[1];
        if (strpos(@$option['relation']['model'], ".") !== false) $option['relation']['model'] = explode(".", $option['relation']['model'])[1];
        if (strpos(@$option['relation']['table'], ".") !== false) $option['relation']['table'] = explode(".", $option['relation']['table'])[1];
        if (($pos = strpos($option['table'], "_")) !== false) {
            $option['table'] = substr($option['table'], $pos + 1);
        }
        if (($pos = strpos(@$option['relation']['model'], "_")) !== false) {
            $option['relation']['model'] = substr($option['relation']['model'], $pos + 1);
        }

        static::$options['module']['name'] = $option['database'];
        static::$options['model'] = Loader::parseName($option['table'], 1);
        static::$options['template'] = $option['template'];
        static::instance(static::$options);
        $filename = static::$module_path . DS . "model" . DS . ucfirst(static::$options['model']) . EXT;
        $content = $this->generate("model", "relation", $option);
        if ($content === false) return false;
        return compact("filename", "content");
    }

    protected function generate($name, $layer = "", $param = [])
    {
        $layer = $layer ?: $name;
        $file = static::$template_path . DS . $name . DS . "$layer.php";
        return $this->render($file, $param);
    }

    protected function generateNamespace($folder = "")
    {
        $namespace = config("app_namespace") . "\\" . strtolower(static::$options['module']['name']);
        $folder && $namespace .= "\\" . ucfirst($folder);
        return $namespace;
    }

    protected function render($filename, $param = [])
    {
        /**
         * @var $controller array
         * @var $model string
         * @var $key string
         */
        if (!file_exists($filename)) {
            $this->errorMsg = "{$filename}模板文件不存在";
            return false;
        }
        extract(static::$options);
        if ($param) extract($param);
        $namespace = $this->generateNamespace();
        try {
            ob_start();
            require($filename);
            $content = ob_get_contents();
            ob_end_clean();
        } catch (\ErrorException $e) {
            $this->errorMsg = $e->getMessage();
            return false;
        }

        $replacement = [
            '{controller.name}' => $controller['name'],
            '{controller.title}' => $controller['title'],
            '{model}' => Loader::parseName($model, 1, true),
            '{type}' => basename($filename, EXT),
            '{version}' => "0.1",
            '{key}' => $key,
            '{namespace}' => $namespace,
            '{time}' => date("Y-m-d H:i:s"),
        ];
        $content = str_replace(array_keys($replacement), array_values($replacement), $content);

        return $content;
    }

    public function saveCURD($curd)
    {
        foreach ($curd['_generate'] as $key) {
            $item = $curd[$key];
            try {
                if (!is_dir(dirname($item['path']))) mkdir(dirname($item['path']), 0777, true);
                $result = file_put_contents($item['path'], $item['content']);
                $msg = "";
            } catch (\Exception $e) {
                $result = false;
                $msg = $e->getMessage();
            }
            if ($result === false) {
                $this->errorMsg = "模块 {$key} 保存失败，写入文件 {$item['path']} 失败。" . $msg;
                return false;
            }
            $this->fileList[] = $item['path'];
        }
        return true;
    }

    public function getError()
    {
        return $this->errorMsg;
    }

    public function getFilesList()
    {
        return $this->fileList;
    }

    protected function parseField()
    {
        $check_option = ["required"];
        foreach (static::$options['field'] as $column_name => $column)
            if (!in_array($column_name, static::$options['column']))
                unset(static::$options['field'][$column_name]);
        foreach (static::$options['field'] as $key => &$field) {
            foreach ($check_option as $option) {
                if (key_exists($option, $field['type_option']) && $field['type_option'][$option]) $field['type_option'][$option] = $option;
                else $field['type_option'][$option] = false;
            }
            $field['type_option_html'] = "";
            foreach ($field['type_option'] as $option_name => $option) {
                if (!$option) unset($field['type_option'][$option_name]);
                else if (in_array($option_name, $check_option))
                    $field['type_option_html'] .= " {$option_name}=\"{$option}\"";
            }
            if (key_exists("length", $field['type_option'])) {
                if (count($length = explode(",", $field['type_option']['length'])) == 2) {
                    if (trim($length[0])) $field['type_option']['minlength'] = +trim($length[0]);
                    if (trim($length[1])) $field['type_option']['maxlength'] = +trim($length[1]);
                }
            }
            if (key_exists("search", $field) && $field["search"]) $field['search'] = true;
            else $field['search'] = false;
        }

        return static::$options['field'];
    }

    protected function getTemplatePath()
    {
        $template = static::$options['template'];
        $template_path = realpath(static::$template_root . DS . $template);
        if (!is_dir($template_path) || !$template) return false;
        return $template_path;
    }
}