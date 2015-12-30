<?php namespace JD\Laradit\Resources;


use JD\Laradit\Helpers\APIRequestHelper;

class ListingResource
{
    protected $authToken;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
    }

    public function getLinksById($names)
    {
        $res = APIRequestHelper::createGetRequest('by_id', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getHotLinks($subreddit_name, $query_params = null)
    {
        $url = 'r/'.$subreddit_name.'/hot';

        if ($query_params) {
            $params = APIRequestHelper::extractParams($query_params);
            $url = $url.'?'.$params;
        }

        $res = APIRequestHelper::createGetRequest($url, $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getNewLinks($subreddit_name, $query_params = null)
    {
        $url = 'r/'.$subreddit_name.'/new';

        if ($query_params) {
            $params = APIRequestHelper::extractParams($query_params);
            $url = $url.'?'.$params;
        }

        $res = APIRequestHelper::createGetRequest($url, $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getRandomLinks($subreddit_name, $query_params = null)
    {
        $url = 'r/'.$subreddit_name.'/random';

        if ($query_params) {
            $params = APIRequestHelper::extractParams($query_params);
            $url = $url.'?'.$params;
        }

        $res = APIRequestHelper::createGetRequest($url, $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }
}