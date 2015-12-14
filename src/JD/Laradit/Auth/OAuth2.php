<?php namespace JD\Laradit\Auth;

class OAuth2
{
    protected $credentials;
    protected $urlProvider;

    public function __construct(Credentials $credentials, UrlProvider $urlProvider)
    {
        $this->credentials = $credentials;
        $this->urlProvider = $urlProvider;
    }


}
