<?php namespace JD\Laradit;

use Illuminate\Support\ServiceProvider;
use JD\Laradit\Auth\Credentials;
use JD\Laradit\Auth\OAuthCredentials;
use JD\Laradit\Auth\UrlProvider;
use JD\Laradit\Facades\Laradit;

class LaraditAuthenticationServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap classes for packages.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../../config/laradit.php' => config_path('laradit.php')
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAliases();
        $this->registerCredentials();
        $this->registerOAuthCredentials();
        $this->registerUrlProvider();
        $this->registerAuthProvider();
    }

    public function registerAliases()
    {
        $this->app->alias('jd.laradit.credentials', Credentials::class);
        $this->app->alias('jd.laradit.urlprovider', UrlProvider::class);
        $this->app->alias('jd.laradit.auth', LaraditAuthenticationServiceProvider::class);
    }

    public function registerCredentials()
    {
        $this->app->singleton('jd.laradit.credentials', function($app) {
            return new Credentials(
                $app['config']->get('laradit.client_id'),
                $app['config']->get('laradit.client_secret'),
                $app['config']->get('laradit.reddit_username'),
                $app['config']->get('laradit.reddit_password')
            );
        });
    }

    public function registerOAuthCredentials()
    {
        $this->app->singleton('jd.laradit.oauth_credentials', function($app) {
            return new OAuthCredentials(
                $app['config']->get('laradit.client_id'),
                $app['config']->get('laradit.oauth_redirect_uri')
            );
        });
    }

    public function registerUrlProvider(){
        $this->app->singleton('jd.laradit.urlprovider', function($app) {
            return new UrlProvider(
                $app['config']->get('laradit.laradit_oauth_redirect_uri')
            );
        });
    }

    public function registerAuthProvider()
    {
        $this->app->bind('jd.laradit.auth', function($app) {
            return new LaraditAuthenticationManager(
                $app['jd.laradit.credentials'],
                $app['jd.laradit.oauth_credentials'],
                $app['jd.laradit.urlprovider']
            );
        });
    }
}