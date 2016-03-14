<?php namespace JD\Laradit\Auth;

use JD\Laradit\Helpers\APIRequestHelper;
use JD\Laradit\Helpers\OAuthRedditHelper;

class OAuth2
{
    protected $credentials;
    protected $urlProvider;
    protected $state;

    public function __construct(OAuthCredentials $credentials, UrlProvider $urlProvider)
    {
        $this->credentials = $credentials;
        $this->urlProvider = $urlProvider;
        $this->state = null;
    }

    public function authorize()
    {
        $baseUrl = 'https://www.reddit.com/api/v1/authorize';
        $urlAndState = OAuthRedditHelper::getAuthorizeUrlAndState($baseUrl, $this->credentials->getClientId(),
            $this->credentials->getRedirectUri(), 'code', true, ['edit']);

        $url = $urlAndState[0];
        $this->state = $urlAndState[1];

        return OAuthRedditHelper::authorize($url);
    }


}
