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
        $res = APIRequestHelper::getRequest('api/v1/me', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getKarma()
    {
        $res = APIRequestHelper::getRequest('api/v1/karma', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getPrefs()
    {
        $res = APIRequestHelper::getRequest('api/v1/prefs', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getTrophies()
    {
        $res = APIRequestHelper::getRequest('api/v1/trophies', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getMySubreddits()
    {
        $res = APIRequestHelper::getRequest('subreddits/mine/subscriber', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }
}
