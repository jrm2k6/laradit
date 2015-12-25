<?php namespace JD\Laradit;

use JD\Laradit\Auth\Credentials;
use JD\Laradit\Auth\ScriptAuth;
use JD\Laradit\Auth\UrlProvider;

class LaraditAuthenticationManager {

    protected $credentials;
    protected $urlProvider;

    public function __construct(Credentials $credentials, UrlProvider $urlProvider)
    {
        $this->credentials = $credentials;
        $this->urlProvider = $urlProvider;
    }

    public function getScriptAuthenticationManager()
    {
        return new ScriptAuth($this->credentials, $this->urlProvider);
    }
}
