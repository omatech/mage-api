<?php

namespace Omatech\Mage\Api;

use Illuminate\Support\ServiceProvider;
use Omatech\Mage\Api\Providers\BindingServiceProvider;
use Omatech\Mage\Api\Domains\Users\Contracts\UserInterface;

class MageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->app->resolving(UserInterface::class, function ($api, $app) {
            dd($api, $app);
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->register(BindingServiceProvider::class);

        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php',
            'mage'
        );

        $this->mergeConfigFrom(
            __DIR__.'/../config/auth.providers.php',
            'auth.providers'
        );

        $this->mergeConfigFrom(
            __DIR__.'/../config/auth.guards.php',
            'auth.guards'
        );
    }
}
