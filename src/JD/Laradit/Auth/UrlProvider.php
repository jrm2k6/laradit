<?php namespace JD\Laradit\Auth;

class UrlProvider {

    protected $redirectUri;

    public function __construct($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    public function getRedirectUri()
    {
        return $this->redirectUri;
    }
}
