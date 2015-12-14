<?php

return [
  'oauth_client_id' => env('LARADIT_OAUTH_CLIENT_ID'),
  'oauth_client_secret' => env('LARADIT_OAUTH_CLIENT_SECRET'),
  'oauth_redirect_uri' => env('LARADIT_OAUTH_CLIENT_REDIRECT_URL'),
  'user_agent' => env('LARADIT_USER_AGENT', 'laradit'),
  'reddit_username' => env('LARADIT_REDDIT_USERNAME'),
  'reddit_password' => ENV('LARADIT_REDDIT_PASSWORD')
];
