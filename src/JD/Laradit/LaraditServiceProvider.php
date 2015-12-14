<?php namespace JD\Laradit;

use Illuminate\Support\ServiceProvider;
use JD\Laradit\Facades\Laradit;

class LaraditServiceProvider extends ServiceProvider {

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

        $this->app['JD\Laradit\Laradit'] = function ($app) {
            return $app['laradit'];
        };
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['laradit'] = $this->app->share(function($app)
        {
            return new LaraditWrapper($app['config']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('laradit');
    }

}