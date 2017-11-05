<?php
/**
 * 驼峰法转下划线
 * @param $str
 * @return string
 */
function toUnderScore($str)
{
    return strtolower(preg_replace('/((?<=[a-z])(?=[A-Z]))/', '_', $str));
}

/**
 * 下划线转驼峰法
 * @param $str
 * @return string
 */
function toCamelCase($str)
{
    $array = explode('_', $str);
    $result = '';
    foreach ($array as $value) {
        $result .= ucfirst($value);
    }

    return $result;
}