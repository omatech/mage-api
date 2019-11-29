<?php

namespace Omatech\Mage\Api\Providers;

use Illuminate\Support\ServiceProvider;
use Omatech\Mage\Api\Contracts\Request\Auth\LoginRequestInterface;
use Omatech\Mage\Api\Domains\Users\Contracts\CreateAccessTokenUserInterface;
use Omatech\Mage\Api\Domains\Users\Contracts\UserInterface;
use Omatech\Mage\Api\Domains\Users\User;
use Omatech\Mage\Api\Repositories\UserRepository;
use Omatech\Mage\Api\Requests\Auth\LoginRequest;

class BindingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(LoginRequestInterface::class, LoginRequest::class);

        $this->app->bind(UserInterface::class, User::class);
        $this->app->bind(CreateAccessTokenUserInterface::class, UserRepository::class);
    }
}
