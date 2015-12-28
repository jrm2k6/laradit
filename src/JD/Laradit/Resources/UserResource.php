<?php namespace JD\Laradit\Resources;

use JD\Laradit\Helpers\APIRequestHelper;

class UserResource
{
    protected $authToken;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
    }

    public function getMe()
    {
        $res = APIRequestHelper::createGetRequest('api/v1/me', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getKarma()
    {
        $res = APIRequestHelper::createGetRequest('api/v1/karma', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getPrefs()
    {
        $res = APIRequestHelper::createGetRequest('api/v1/prefs', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getTrophies()
    {
        $res = APIRequestHelper::createGetRequest('api/v1/trophies', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getMySubreddits()
    {
        $res = APIRequestHelper::createGetRequest('subreddits/mine/subscriber', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }
}
