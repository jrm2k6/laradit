<?php namespace JD\Laradit\Resources;


use JD\Laradit\Helpers\APIRequestHelper;

class SubredditResource
{
    protected $authToken;

    public function __construct($authToken)
    {
        $this->authToken = $authToken;
    }

    public function getAboutSubreddit($subreddit_name)
    {
        $res = APIRequestHelper::createGetRequest('r/'.$subreddit_name.'/about', $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function getRecommendedSubreddits($subreddit_names)
    {
        $subreddit_names = join(',', $subreddit_names);
        $res = APIRequestHelper::createGetRequest('api/recommend/sr/'.$subreddit_names, $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function searchSubredditsByName($substring)
    {
        $res = APIRequestHelper::createPostRequest('api/search_reddit_names', $this->authToken, ['query' => $substring]);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function searchSubredditsByTopic($topic)
    {
        $res = APIRequestHelper::createGetRequest('api/subreddits_by_topic?query='.$topic, $this->authToken);
        return APIRequestHelper::getJsonResponse($res);
    }


}