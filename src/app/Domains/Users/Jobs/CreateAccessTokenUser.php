<?php

namespace Omatech\Mage\Api\Domains\Users\Jobs;

use Omatech\Mage\Api\Domains\Users\Contracts\CreateAccessTokenUserInterface;

class CreateAccessTokenUser
{
    public function make()
    {
        return app()->make(CreateAccessTokenUserInterface::class)->createAccessToken();
    }
}
