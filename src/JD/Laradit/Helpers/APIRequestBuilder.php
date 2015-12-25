<?php namespace JD\Laradit\Helpers;

class APIRequestBuilder
{
    public static function getRequestAttributes($url, $token)
    {
        return [
            'url' => 'https://oauth.reddit.com/api/'.$url,
            'headers' => [
                'headers' => [
                    'User-Agent' => 'my user agent',
                    'Authorization' => 'bearer '.$token
                ]
            ]
        ];
    }
}
