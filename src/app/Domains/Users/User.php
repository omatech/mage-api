<?php

namespace Omatech\Mage\Api\Domains\Users;

use Omatech\Mage\Api\Domains\Users\Contracts\UserInterface;
use Omatech\Mage\Core\Domains\Users\User as CoreUser;

class User extends CoreUser implements UserInterface
{
    private $accessToken;

    public function createAccessToken()
    {
    }
}
