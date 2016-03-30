<?php namespace JD\Laradit\Resources;

use JD\Laradit\Helpers\APIRequestHelper;

class OAuth2AccountResource
{
    protected $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getMe()
    {
        $res = APIRequestHelper::createGetRequest('api/v1/me', $this->accessToken);
        return APIRequestHelper::getJsonResponse($res);
    }
}