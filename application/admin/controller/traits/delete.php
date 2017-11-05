<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/2/21
 * Time: 22:09
 */

namespace app\admin\controller\traits;

use think\Exception;
use think\Model;
use think\Request;

/**
 * Trait delete
 * @method void success($msg = '', $url = null, $data = '', $wait = 3, array $header = [])
 * @method void error($msg = '', $url = null, $data = '', $wait = 3, array $header = [])
 * @property Model $Model
 * @package app\admin\controller\traits
 */
trait delete
{
    /**
     * 删除
     * @param Request $request
     * @throws Exception
     */
    public function delete(Request $request)
    {
        if (empty($this->Model)) throw new Exception("控制器必须包含Model属性");
        if (!$request->isAjax()) $this->error("非法访问");
        /** @var Model $Model */
        $ids = $request->request("ids");
        if (!is_array($ids))
            if (strpos($ids, ",") !== false)
                $ids = explode(",", $ids);
            else
                $ids = [$ids];

        if (!$ids) $this->error("参数错误");

        $Model = new $this->Model();
        $result = $Model::destroy($ids);
        if ($result === false) $this->error("操作失败");
        $this->success($result . "条记录删除成功", null);
    }
}