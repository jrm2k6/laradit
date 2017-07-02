<?php namespace JD\Laradit\Auth;

class Credentials
{
    protected $clientId;
    protected $clientSecret;
    protected $clientUsername;
    protected $clientPassword;
    protected $userAgent;

    public function __construct($clientId, $clientSecret, $clientUsername, $clientPassword, $userAgent)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->clientUsername = $clientUsername;
        $this->clientPassword = $clientPassword;
        $this->userAgent = $userAgent;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getClientUsername()
    {
        return $this->clientUsername;
    }

    public function getClientPassword()
    {
        return $this->clientPassword;
    }

    public function getUserAgent()
    {
        return $this->clientPassword;
    }
}