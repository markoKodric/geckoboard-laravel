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
        $this->publishes([
            __DIR__.'/../config/geckoboard.php' => config_path('geckoboard.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        if (!file_exists(__DIR__.'/../config')) {
            mkdir(__DIR__.'/../config', 0755);
        }

        $this->mergeConfigFrom(__DIR__.'/../config/geckoboard.php', 'geckoboard');

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
