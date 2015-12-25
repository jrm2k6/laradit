<?php namespace JD\Laradit;

use Illuminate\Support\ServiceProvider;

class LaraditResourceServiceProvider extends ServiceProvider {

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
        $this->app->bind('jd.laradit.manager', function($app) {
            return new LaraditResourceManager();
        });
    }
}