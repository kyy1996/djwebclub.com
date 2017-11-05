<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/7/23
 * Time: 12:42
 */

namespace app\common\model\traits;

/**
 * Trait ip
 * @package app\common\model\traits
 */
trait ip
{
    public function __construct($data = [])
    {
        is_array($this->auto) ? array_search('ip', $this->auto) === false && $this->auto[] = "ip" : $this->auto = ['ip'];
        parent::__construct($data);
    }

    protected function setIpAttr($value = "")
    {
        return $value ?: request()->ip();
    }

    protected function getIpLocationAttr()
    {
        return get_ip_location($this->getAttr('ip'));
    }
}