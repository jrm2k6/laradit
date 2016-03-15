<?php namespace JD\Laradit\Auth;

use JD\Laradit\Helpers\APIRequestHelper;
use JD\Laradit\Helpers\OAuthRedditHelper;

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

    public function getAuthorizationUrl()
    {
        $baseUrl = 'https://www.reddit.com/api/v1/authorize';
        return OAuthRedditHelper::getAuthorizeUrlAndState($baseUrl, $this->credentials->getClientId(), 'code',
            $this->credentials->getRedirectUri(), true, ['edit']);
    }
}
