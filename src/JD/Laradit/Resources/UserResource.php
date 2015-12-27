<?php namespace JD\Laradit\Resources;

use GuzzleHttp\Client;
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
        $requestAttributes = APIRequestHelper::getRequestAttributes('me', $this->authToken);

        $client = new Client();
        $res = $client->request('GET',
            $requestAttributes['url'],
            $requestAttributes['headers']
        );

        return APIRequestHelper::getJsonResponse($res);
    }
}
