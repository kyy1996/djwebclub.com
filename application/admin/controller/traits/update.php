<?php
/**
 * Created by PhpStorm.
 * User: kongy
 * Date: 2017/2/21
 * Time: 22:10
 */

namespace app\admin\controller\traits;

use think\Exception;
use think\Model;
use think\Request;

/**
 * Trait update
 * @method void success($msg = '', $url = null, $data = '', $wait = 3, array $header = [])
 * @method void error($msg = '', $url = null, $data = '', $wait = 3, array $header = [])
 * @property Model $Model
 * @package app\admin\controller\traits
 */
trait update {
    protected function dataGetTrigger(array $data) {
        return $data;
    }

    protected function dataSetTrigger(array $data) {
        foreach ($data as &$value) {
            $value = trim($value);
        }

        return $data;
    }

    /**
     * 修改
     * @param Request $request
     * @param int     $id
     * @throws Exception
     */
    public function update(Request $request, $id = 0) {
        if (empty($this->Model)) throw new Exception("控制器必须包含Model属性");
        if (!$request->isAjax()) $this->error("非法访问");
        $data = array_merge($request->request(), (array)$request->file());

        /** @var Model $Model */
        $Model     = new $this->Model();
        $Validator = validate(basename(str_replace('\\', DS, $this->Model)));

        //获取主键
        $pk = $Model->getPk();
        is_array($pk) && $pk = $pk[0];//多个主键取第一个

        if (!$id) unset($data[$pk]);//主键不存在，为插入操作。

        if ($id && !$Model = $Model::get($id)) $this->error("数据不存在");

        //更新数据预处理
        $data = $this->dataSetTrigger($data);
        if (!$Validator->check($data, [], 'update')) $this->error($Validator->getError());
        $result = $Model->allowField(true)->save($data);
        if ($result === false) $this->error("操作失败：" . $Model->getError());

        //返回数据预处理
        $data = $this->dataGetTrigger($Model->toArray());
        if (!$id) $this->success($Model->$pk . "#数据 新增成功，写入了 {$result} 条数据", null, $data);
        else $this->success($Model->$pk . "#数据 保存成功，更新了 {$result} 条数据", null, $data);
    }
}