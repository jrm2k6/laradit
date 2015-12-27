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
        $res = APIRequestHelper::getRequest('me', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getKarma()
    {
        $res = APIRequestHelper::getRequest('karma', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getPrefs()
    {
        $res = APIRequestHelper::getRequest('prefs', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getTrophies()
    {
        $res = APIRequestHelper::getRequest('trophies', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }
}
