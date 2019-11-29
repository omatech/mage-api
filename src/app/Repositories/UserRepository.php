<?php

namespace Omatech\Mage\Api\Repositories;

use Omatech\Mage\Api\Domains\Users\Contracts\CreateAccessTokenUserInterface;
use Omatech\Mage\Core\Repositories\UserRepository as CoreUserRepository;

class UserRepository extends CoreUserRepository implements CreateAccessTokenUserInterface
{
    public function createAccessToken()
    {
        dd('hola');
    }
}
