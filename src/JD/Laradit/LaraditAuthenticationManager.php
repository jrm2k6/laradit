<?php namespace JD\Laradit;

use JD\Laradit\Auth\Credentials;
use JD\Laradit\Auth\OAuth2;
use JD\Laradit\Auth\OAuthCredentials;
use JD\Laradit\Auth\ScriptAuth;
use JD\Laradit\Auth\UrlProvider;

class LaraditAuthenticationManager {

    protected $credentials;
    protected $oAuthCredentials;
    protected $urlProvider;

    public function __construct(Credentials $credentials, OAuthCredentials $oAuthCredentials, UrlProvider $urlProvider)
    {
        $this->credentials = $credentials;
        $this->oAuthCredentials = $oAuthCredentials;
        $this->urlProvider = $urlProvider;
    }

    public function getScriptAuthenticationManager()
    {
        return new ScriptAuth($this->credentials, $this->urlProvider);
    }

    public function getOAuthManager()
    {
        return new OAuth2($this->oAuthCredentials, $this->urlProvider);
    }
}
