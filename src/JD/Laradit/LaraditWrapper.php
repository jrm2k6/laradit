<?php namespace JD\Laradit;

use Illuminate\Config\Repository;
use JD\Laradit\Auth\Credentials;
use JD\Laradit\Auth\OAuth2;
use JD\Laradit\Auth\ScriptAuth;
use JD\Laradit\Auth\UrlProvider;

class LaraditWrapper {

    protected $oauthManager;
    protected $scriptAuth;
    protected $credentials;

    /**
     * Create a new Laradit Wrapper instance
     *
     * @param  \Illuminate\Config\Repository $config
     * @return void
     */
    public function __construct(Repository $config)
    {
        $this->credentials = new Credentials(
            $config->get('laradit.client_id'),
            $config->get('laradit.client_secret'),
            $config->get('laradit.reddit_username'),
            $config->get('laradit.reddit_password')
        );

        $urlProvider = new UrlProvider($config->get('laradit.oauth_redirect_uri'));

        $this->oauthManager = new OAuth2($this->credentials, $urlProvider);
        $this->scriptAuth = new ScriptAuth($this->credentials, $urlProvider);
    }

    public function getScriptAuthManager()
    {
        return $this->scriptAuth;
    }
}
