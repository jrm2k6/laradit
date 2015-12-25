<?php namespace JD\Laradit\Resources;

use JD\Laradit\Helpers\APIRequestBuilder;
use GuzzleHttp\Client;

class UserResource
{
    protected $authToken;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
    }

    public function getMe()
    {
        $requestAttributes = APIRequestBuilder::getRequestAttributes('me', $this->authToken);

        $client = new Client();
        $res = $client->request('GET',
            $requestAttributes->url,
            $requestAttributes->headers
        );

        return $res;
    }
}
