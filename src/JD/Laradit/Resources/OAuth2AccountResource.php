<?php namespace JD\Laradit\Resources;

use JD\Laradit\Helpers\APIRequestHelper;

class OAuth2AccountResource
{
    const URL_ME = 'api/v1/me';

    protected $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getMe()
    {
        $res = APIRequestHelper::createGetRequest(self::URL_ME, $this->accessToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getMyKarma()
    {
        $res = APIRequestHelper::createGetRequest(self::URL_ME.'/karma', $this->accessToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getMyPreferences()
    {
        $res = APIRequestHelper::createGetRequest(self::URL_ME.'/prefs', $this->accessToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getMyTrophies()
    {
        $res = APIRequestHelper::createGetRequest(self::URL_ME.'/trophies', $this->accessToken);
        return APIRequestHelper::getJsonResponse($res);
    }
}