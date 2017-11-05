<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/2/22
 * Time: 20:57
 */

namespace app\api\controller;


use OSS\Core\OssException;
use OSS\OssClient;

class OSSHelper
{
    protected $error = "";

    public function upload(\think\File $file, $dir = "")
    {
        if (!$dir && $file->checkImg()) $dir = "images";
        $filename = uniqid(true) . "." . pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);
        $object = $dir . "/" . $filename;
        try {
            $OSS = new OssClient(config("aliyun_oss.access_id"), config("aliyun_oss.access_key"), config("aliyun_oss.endpoint"), !!config("aliyun_oss.cname"));
            $OSS->uploadFile(config("aliyun_oss.bucket"), $object, $file->getPathname());
        } catch (OssException $e) {
            $this->error = $e->getMessage();
            return false;
        }

        $url = "http://" . config("aliyun_oss.endpoint") . "/" . $object;
        return $url;
    }

    public function getError()
    {
        return $this->error;
    }
}