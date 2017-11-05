<?php

namespace app\index\controller;

use app\common\model\Subscriber as SubscriberModel;

class Subscribe extends base
{
    public function subscribe($email = "")
    {
        if (!$email) {
            $this->error("请输入E-mail");
        }

        $model = new SubscriberModel();
        $data['email'] = $email;
        $result = $model->allowField(true)->validate(true)->save($data);
        if (!$result) $this->error("订阅失败，" . $model->getError());
        $this->success("感谢您的订阅。我们将会为您发送最新的社团新闻！");
    }
}
