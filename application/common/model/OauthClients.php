<?php
/**
 * Created by Webmaster CURD Generator
 * Version: 0.1
 * Type: model
 * Time: 2017-05-02 01:00:15
 */

namespace app\common\model;

use think\Model;

class OauthClients extends Model
{
    protected $auto = ['client_secret', "scope"];

    protected $pk = "id";

    protected $defaultAppInfo = [
        'client_id' => "",
        'client_secret' => "",
        'redirect_uri' => "",
        'grant_types' => "authorization_code",
        'scope' => "basic",
        'user_id' => "",
    ];

    public function registerApp(array $app_info)
    {
        $app_info = array_merge($this->defaultAppInfo, $app_info);
        return $this->write($app_info);
    }

    public function updateApp(array $app_info)
    {
        $app_info = array_merge($this->defaultAppInfo, $app_info);
        return $this->write($app_info);
    }

    public function write($data)
    {
        return $this->allowField(true)->validate(true)->save($data);
    }

    protected function setClientSecretAttr($value = "", $data)
    {
        return $value ?: $this->encrypt($data['client_id']);
    }

    protected function setScopeAttr($value = "")
    {
        return $value ?: "basic";
    }

    protected function getGrantTypesAttr($value = "")
    {
        return array_map("trim", (array)explode(" ", $value));
    }

    protected function setGrantTypesAttr($value = [])
    {
        return implode(" ", $value);
    }

    public function encrypt($string)
    {
        return substr((new \OpenSSL())->sign($string . time()), $this->keyLength());
    }

    protected function keyLength()
    {
        return -30;
    }
}