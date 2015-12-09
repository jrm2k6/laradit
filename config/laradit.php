<?php

return [
  oauth_client_id => env('LARADIT_OAUTH_CLIENT_ID'),
  oauth_client_secret => env('LARADIT_OAUTH_CLIENT_ID'),
  oauth_redirect_uri => env('LARADIT_OAUTH_CLIENT_ID'),
  user_agent => env('LARADIT_USER_AGENT', 'laradit'),
  user => env('LARADIT_REDDIT_USERNAME'),
  pswd => ENV('LARADIT_REDDIT_PASSWORD')
];
