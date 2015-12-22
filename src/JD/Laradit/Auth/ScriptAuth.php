<?php namespace JD\Laradit\Auth;

use GuzzleHttp\Client;

class ScriptAuth
{
    protected $credentials;
    protected $urlProvider;

    public function __construct(Credentials $credentials, UrlProvider $urlProvider)
    {
        $this->credentials = $credentials;
        $this->urlProvider = $urlProvider;
    }

    public function getRequestToken()
    {
        $client = new Client();
        $res = $client->request('POST',
            'https://www.reddit.com/api/v1/access_token',
            [
                'auth' => [$this->credentials->getClientId(), $this->credentials->getClientSecret()],
                'form_params' => [
                    'grant_type' => 'password',
                    'username' => $this->credentials->getClientUsername(),
                    'password' => $this->credentials->getClientPassword()
            ]
        ]);

        return $res;
    }
}
