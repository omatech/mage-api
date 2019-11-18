<?php

namespace Omatech\Mage\Api;

use Illuminate\Support\ServiceProvider;

class MageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php',
            'mage'
        );
    }
}
