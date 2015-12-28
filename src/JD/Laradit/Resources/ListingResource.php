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
        $res = APIRequestHelper::createGetRequest('by_id', $this->authToken, ['query' => join(',', $names)]);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getHotLinks($subreddit_name)
    {
        $res = APIRequestHelper::createGetRequest('r/'.$subreddit_name.'/hot', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getNewLinks($subreddit_name)
    {
        $res = APIRequestHelper::createGetRequest('r/'.$subreddit_name.'/new', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getRandomLinks($subreddit_name)
    {
        $res = APIRequestHelper::createGetRequest('r/'.$subreddit_name.'/random', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }
}