<?php

namespace App\Controller;

use App\Entity\User;

class UserController
{
    public function __invoke(User $data): User
    {
        return $data;
    }
}