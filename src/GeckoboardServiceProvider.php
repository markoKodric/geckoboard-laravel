<?php
namespace Mare06xa\Geckoboard;


use Illuminate\Support\ServiceProvider;

class GeckoboardServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //$this->mergeConfigFrom(__DIR__.'/../config/geckoboard.php', 'geckoboard');

        // Register the service the package provides.
        $this->app->alias(Geckoboard::class, 'geckoboard');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['geckoboard'];
    }
}