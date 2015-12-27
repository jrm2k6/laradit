<?php namespace JD\Laradit\Helpers;
use GuzzleHttp;

class APIRequestHelper
{
    public static function getRequestAttributes($url, $token)
    {
        return [
            'url' => 'https://oauth.reddit.com/api/v1/'.$url,
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
}
