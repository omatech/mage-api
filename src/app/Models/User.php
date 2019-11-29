<?php

namespace Omatech\Mage\Api\Models;

use Laravel\Passport\HasApiTokens;
use Omatech\Mage\Core\Models\User as MageUser;

class User extends MageUser
{
    use HasApiTokens;
}
