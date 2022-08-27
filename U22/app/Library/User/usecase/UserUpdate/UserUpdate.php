<?php
namespace App\Library\User\usecase\UserUpdate;

use App\Library\User\User;
use App\Library\User\usecase\UserUpdate\UserUpdatePort;

class UserUpdate
{
    public function __construct(UserUpdatePort $port)
    {
        $this->port = $port;
    }

    public function execute(User $user): bool
    {
        return $this->port->update($user);
    }
}