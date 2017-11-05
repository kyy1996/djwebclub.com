<?php

namespace app\oauth\controller;


use app\common\model\Member;
use think\Request;

class User extends base
{
    public function login(Request $request, $callback = "")
    {
        $callback = $callback ? base64_decode($callback) : "";

        $this->assign("_error", "");
        if ($request->isPost()) {
            $User = new Member();
            $uid = $User->login($request->post("username"), $request->post("password"));
            $error = $User->getError();

            if ($uid > 0) {
                $return = redirect($callback ? url($callback, "", "", true) : "/");
            } else {
                $this->assign("_error", $error);
                $return = $this->fetch();
            }
        } else {
            $return = $this->fetch();
        }

        return $return;
    }

    public function info(Request $request, $uid = 0)
    {
        $accessToken = $this->oauthServer->getResourceController()->getAccessTokenData($this->oauthRequest, $this->oauthServer->getResponse());
        if (!$uid && (!key_exists("user_id", $accessToken) || !$accessToken["user_id"])) {
            $this->json(["error" => "Invalid uid parameter.", "description" => "No user was attached with the access token and no UID was provided."]);
        }
        !$uid && $uid = $accessToken['user_id'];
        $user = Member::get($uid, "user_groups");
        !$user && $this->json(["error" => "User does not exist.", "description" => "The uid provided or attached to the access token is invalid."]);

        $info = $user->visible(["uid", "email", "mobile", "avatar", "admin", 'user_groups.id', 'user_groups.title'])->toArray();
        $info['avatar'] && $info['avatar'] = $request->scheme() . "://" . $request->host() . $info['avatar'];
        $this->json($info);
        $this->responseEnd();
    }
}
