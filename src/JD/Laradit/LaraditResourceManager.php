<?php namespace JD\Laradit;


use JD\Laradit\Resources\UserResource;

class LaraditResourceManager
{
    protected $authToken;

    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
    }

    public function getUserResource()
    {
        return new UserResource($this->authToken);
    }
}