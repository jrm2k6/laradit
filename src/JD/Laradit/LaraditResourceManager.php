<?php namespace JD\Laradit;


use JD\Laradit\Resources\ListingResource;
use JD\Laradit\Resources\OAuth2AccountResource;
use JD\Laradit\Resources\SubredditResource;
use JD\Laradit\Resources\UserResource;

class LaraditResourceManager
{
    protected $authToken;
    protected $accessToken;

    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
    }

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getUserResource()
    {
        return new UserResource($this->authToken);
    }

    public function getSubredditResource()
    {
        return new SubredditResource($this->authToken);
    }

    public function getListingsResource()
    {
        return new ListingResource($this->authToken);
    }

    public function getAccountResource()
    {
        return new OAuth2AccountResource($this->accessToken);
    }
}