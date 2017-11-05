<?php

namespace app\oauth\controller;

use app\common\model\OauthClients;
use OAuth2\Request as OAuth2Request;
use OAuth2\Response as OAuth2Response;
use think\Request;

class Server extends base
{
    protected $description = "OAuth2.0统一认证";

    public function token()
    {
        $this->oauthServer->handleTokenRequest(OAuth2Request::createFromGlobals())->send();
        $this->responseEnd();
    }

    public function authorize(Request $request)
    {
        //检查请求参数
        $client_id = $request->get("client_id");
        if (!$client_id) {
            $this->assign("_error", "参数错误");
            $this->show($this->fetch());
            $this->responseEnd();
        }

        //判断是否登录
        $user = $this->user;
        $loginUrl = url($request->module() . "/user/login", ["callback" => base64_encode($request->url())]);
        if (!is_array($user) || !key_exists("email", $user) || !$user['email']) {
            $this->redirect($loginUrl);
        }

        $this->assign("_loginUrl", $loginUrl);

        //检查Client App是否存在
        $OauthClients = new OauthClients();
        $App = $OauthClients::get(["client_id" => $client_id]);
        if (!$App) {
            $this->assign("_error", "应用{$client_id}不存在");
            $this->show($this->fetch());
        }

        //不是POST方法，显示授权登录页面
        if (!$request->isPost()) {
            $this->assign("_app", $App);
            $this->assign("_user", $user);
            $this->show($this->fetch());
        }

        //POST操作，进行授权

        $oauth_request = OAuth2Request::createFromGlobals();
        $oauth_response = new OAuth2Response();

        //验证Request
        if (!$this->oauthServer->validateAuthorizeRequest($oauth_request, $oauth_response)) {
            $oauth_response->send();
            $this->responseEnd();
        }

        // print the authorization code if the user has authorized your client
        $is_authorized = ($request->post("authorized") === 'yes');
        $this->oauthServer->handleAuthorizeRequest($oauth_request, $oauth_response, $is_authorized, $user['uid']);
        $oauth_response->send();
        $this->responseEnd();
    }
}
