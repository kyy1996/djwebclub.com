<?php

namespace app\oauth\controller;

use OAuth2\GrantType\AuthorizationCode;
use OAuth2\GrantType\ClientCredentials;
use OAuth2\GrantType\RefreshToken;
use OAuth2\Request as OAuth2Request;
use OAuth2\Server as OAuth2Server;
use OAuth2\Storage\Pdo as OAuth2PDO;
use think\Controller;
use think\Db;
use think\Request;

class base extends Controller
{
    /**
     * @var null|\array
     */
    protected $user = null;
    /**
     * @var $oauthServer OAuth2Server
     */
    protected $oauthServer;

    /**
     * @var $oauthRequest OAuth2Request
     */
    protected $oauthRequest;

    protected $publicUri = [
        'oauth/server/authorize',
        'oauth/server/token',
        'oauth/user/login',
    ];

    protected $description = "";

    public function _initialize()
    {
        $storage = new OAuth2PDO(Db::connect()->connect(), [
            'client_table' => config("database.prefix") . 'oauth_clients',
            'access_token_table' => config("database.prefix") . 'oauth_access_tokens',
            'refresh_token_table' => config("database.prefix") . 'oauth_refresh_tokens',
            'code_table' => config("database.prefix") . 'oauth_authorization_codes',
            'user_table' => config("database.prefix") . 'oauth_users',
            'jwt_table' => config("database.prefix") . 'oauth_jwt',
            'jti_table' => config("database.prefix") . 'oauth_jti',
            'scope_table' => config("database.prefix") . 'oauth_scopes',
            'public_key_table' => config("database.prefix") . 'oauth_public_keys',
        ]);

        $this->oauthServer = new OAuth2Server($storage, [
            'use_jwt_access_tokens' => false,
            'store_encrypted_token_string' => true,
            'use_openid_connect' => false,
            'id_lifetime' => 3600,
            'access_lifetime' => 3600,
            'www_realm' => 'Webmaster OAuth2 Service',
            'token_param_name' => 'access_token',
            'token_bearer_header_name' => 'Bearer',
            'enforce_state' => false,
            'require_exact_redirect_uri' => true,
            'allow_implicit' => false,
            'allow_credentials_in_request_body' => true,
            'allow_public_clients' => true,
            'always_issue_new_refresh_token' => false,
            'unset_refresh_token_after_use' => true,
        ]);

        //添加授权类型
        // Add the "Client Credentials" grant type (it is the simplest of the grant types)
        $this->oauthServer->addGrantType(new ClientCredentials($storage));

        // Add the "Authorization Code" grant type (this is where the oauth magic happens)
        $this->oauthServer->addGrantType(new AuthorizationCode($storage));

        $this->oauthServer->addGrantType(new RefreshToken($storage, [
            'always_issue_new_refresh_token' => true,
            'unset_refresh_token_after_use' => true
        ]));

        $this->user = is_login();

        if (!in_array(strtolower(implode("/", [Request::instance()->module(), Request::instance()->controller(), Request::instance()->action()])), $this->publicUri)) {
            if (!$this->oauthServer->verifyResourceRequest($this->oauthRequest = OAuth2Request::createFromGlobals())) {
                $this->oauthServer->getResponse()->send();
                if (!$this->oauthServer->getResponse()->getResponseBody())
                    $this->show(json_encode(["error" => "Authorization Required."]));
                $this->responseEnd();
            }
        }

        $this->assign("_description", $this->description);
    }

    protected function json($data)
    {
        header("Content-Type: text/json;charset=UTF-8");
        $this->show(json_encode($data));
    }

    protected function show($text)
    {
        echo($text);
        $this->responseEnd();
    }

    protected function responseEnd()
    {
        exit();
    }
}