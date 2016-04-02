<?php namespace JD\Laradit\Resources;

use JD\Laradit\Helpers\APIRequestHelper;

class OAuth2LinksResource
{
    protected $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function postComment($thingId, $text)
    {
        $data = ['parent' => $thingId, 'text' => $text, 'api_type' => 'json'];
        $res = APIRequestHelper::createPostRequest('api/comment', $this->accessToken, $data);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function editComment($thingId, $text)
    {
        $data = ['thing_id' => $thingId, 'text' => $text, 'api_type' => 'json'];
        $res = APIRequestHelper::createPostRequest('api/editusertext', $this->accessToken, $data);
        return APIRequestHelper::getJsonResponse($res);
    }

    public function deleteComment($commentId)
    {
        $data = ['id' => $commentId, 'api_type' => 'json'];
        $res = APIRequestHelper::createPostRequest('api/comment', $this->accessToken, $data);
        return APIRequestHelper::getJsonResponse($res);
    }
}