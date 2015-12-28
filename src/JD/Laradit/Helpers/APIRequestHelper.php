<?php namespace JD\Laradit\Helpers;
use GuzzleHttp;
use GuzzleHttp\Client;

class APIRequestHelper
{
    public static function getRequestAttributes($url, $token, $data)
    {
        $properties = [
            'headers' => [
                'User-Agent' => 'my user agent',
                'Authorization' => 'bearer '.$token
            ]
        ];

        if ($data) {
            $properties['form_params'] = $data;
        }

        return [
            'url' => 'https://oauth.reddit.com/'.$url,
            'properties' => $properties
        ];
    }

    public static function getJsonResponse(GuzzleHttp\Psr7\Response $res)
    {
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody()->getContents(), true);
        }

        return [];
    }

    private static function createRequest($type, $url, $token, $data = null)
    {
        $requestAttributes = APIRequestHelper::getRequestAttributes($url, $token, $data);

        $client = new Client();
        $res = $client->request($type,
            $requestAttributes['url'],
            $requestAttributes['properties']
        );

        return $res;
    }

    public static function createGetRequest($url, $token, $data = null)
    {
        return self::createRequest('GET', $url, $token);
    }

    public static function createPostRequest($url, $token, $data = null)
    {
        return self::createRequest('POST', $url, $token, $data);
    }
}
