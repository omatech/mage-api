<?php

namespace Omatech\Mage\Api\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Omatech\Mage\Api\MageServiceProvider;
use Orchestra\Testbench\TestCase;

class BaseTestCase extends TestCase
{
    //use RefreshDatabase;

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    public function getPackageProviders($app): array
    {
        return [
            MageServiceProvider::class,
        ];
    }
}
