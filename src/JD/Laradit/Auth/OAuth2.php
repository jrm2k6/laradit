<?php namespace JD\Laradit\Auth;

use JD\Laradit\Helpers\OAuthRedditHelper;
use GuzzleHttp\Client;

class OAuth2
{
    protected $credentials;
    protected $urlProvider;
    protected $state;

    public function __construct(OAuthCredentials $credentials)
    {
        $this->credentials = $credentials;
        $this->state = null;
    }

    public function getAuthorizationUrl($scopes = [])
    {
        $baseUrl = 'https://www.reddit.com/api/v1/authorize';
        return OAuthRedditHelper::getAuthorizeUrlAndState($baseUrl, $this->credentials->getClientId(), 'code',
            $this->credentials->getRedirectUri(), true, $scopes);
    }

    public function getAccessAndRefreshToken($code)
    {
        $baseUrl = 'https://www.reddit.com/api/v1/access_token';

        $client = new Client();
        $options = [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => $this->credentials->getRedirectUri()
            ],
            'auth' => [
                $this->credentials->getClientId(),
                $this->credentials->getClientSecret()
            ]
        ];

        $res = $client->request('POST', $baseUrl, $options);
        $body = $res->getBody();
        $content = json_decode($body->getContents());

        $accessToken = $content->access_token;
        $refreshToken = $content->refresh_token;

        return [
            'access_token' => $accessToken,
            'refresh_token' => $refreshToken
        ];
    }
}
