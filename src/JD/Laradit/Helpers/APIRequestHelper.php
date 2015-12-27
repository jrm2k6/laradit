<?php namespace JD\Laradit\Helpers;
use GuzzleHttp;
use GuzzleHttp\Client;

class APIRequestHelper
{
    public static function getRequestAttributes($url, $token)
    {
        return [
            'url' => 'https://oauth.reddit.com/'.$url,
            'headers' => [
                'headers' => [
                    'User-Agent' => 'my user agent',
                    'Authorization' => 'bearer '.$token
                ]
            ]
        ];
    }

    public static function getJsonResponse(GuzzleHttp\Psr7\Response $res)
    {
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody()->getContents(), true);
        }

        return [];
    }

    public static function getRequest($url, $token)
    {
        $requestAttributes = APIRequestHelper::getRequestAttributes($url, $token);

        $client = new Client();
        $res = $client->request('GET',
            $requestAttributes['url'],
            $requestAttributes['headers']
        );

        return $res;
    }
}
