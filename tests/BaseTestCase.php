<?php

namespace Omatech\Mage\Api\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\PassportServiceProvider;
use Omatech\Mage\Api\Contracts\Requests\Auth\LoginRequestInterface;
use Omatech\Mage\Api\Domains\Users\Contracts\CreateAccessTokenUserInterface;
use Omatech\Mage\Api\Domains\Users\Contracts\UserInterface;
use Omatech\Mage\Api\Domains\Users\User as UserDomain;
use Omatech\Mage\Api\MageServiceProvider;
use Omatech\Mage\Api\Models\User;
use Omatech\Mage\Api\Repositories\UserRepository;
use Omatech\Mage\Api\Requests\Auth\LoginRequest;
use Omatech\Mage\Core\Domains\Users\Contracts\FindUserInterface;
use Omatech\Mage\Core\MageServiceProvider as OmatechMageServiceProvider;
use Orchestra\Testbench\TestCase;

class BaseTestCase extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(LoginRequestInterface::class, LoginRequest::class);

        $this->app->resolving(UserInterface::class, function ($api, $app) {
            dd($api, $app);
        });

        //$this->app->bind(UserInterface::class, UserDomain::class);
        $this->app->bind(FindUserInterface::class, UserRepository::class);
        $this->app->bind(CreateAccessTokenUserInterface::class, UserRepository::class);

        $this->artisan('vendor:publish --tag=mage-migrations')->run();

        $this->artisan('migrate');
        $this->artisan('passport:install')->run();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    public function getPackageProviders($app): array
    {
        return [
            OmatechMageServiceProvider::class,

            MageServiceProvider::class,
            PassportServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', env('DB_CONNECTION'));
        $app['config']->set('database.connections.mysql', [
            'driver'   => 'mysql',
            'host'     => env('DB_TEST_HOST'),
            'database' => env('DB_TEST_DATABASE'),
            'username' => env('DB_TEST_USERNAME'),
            'password' => env('DB_TEST_PASSWORD'),
        ]);

        //Override configuration for testing
        $app['config']->set('auth.providers.mage.model', User::class);
    }
}
