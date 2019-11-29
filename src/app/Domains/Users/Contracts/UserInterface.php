<?php

namespace Omatech\Mage\Api\Domains\Users\Contracts;

use Omatech\Mage\Core\Domains\Users\Contracts\UserInterface as CoreUserInterface;

interface UserInterface extends CoreUserInterface
{
    public function createAccessToken();
}
