<?php namespace JD\Laradit\Auth;

class OAuthCredentials
{
    protected $clientId;
    protected $redirectUri;

    public function __construct($clientId, $redirectUri)
    {
        $this->clientId = $clientId;
        $this->redirectUri = $redirectUri;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getRedirectUri()
    {
        return $this->redirectUri;
    }
}