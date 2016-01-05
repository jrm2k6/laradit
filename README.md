##Installation

```composer require jrm2k6/laradit```

## Configuration

Add in ```config/app.php```:

```
 'providers' => [
    JD\Laradit\LaraditAuthenticationServiceProvider::class,
    JD\Laradit\LaraditResourceServiceProvider::class,
  ]
```

Add in your .env file:

```
LARADIT_CLIENT_ID=your-client-id
LARADIT_CLIENT_SECRET=yout-client-secret
LARADIT_OAUTH_REDIRECT_URI=your-callback
LARADIT_REDDIT_USERNAME=your-username
LARADIT_REDDIT_PASSWORD=your-password
LARADIT_USER_AGENT=your-user-agent
```

## Usage

To get a authentication token for script apps:

```
LaraditAuth::getScriptAuthenticationManager()->getAccessToken();
```

You can then set the token:

```
 Laradit::setAuthToken($authToken);
```

