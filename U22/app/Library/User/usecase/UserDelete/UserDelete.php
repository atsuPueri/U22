<?php
namespace App\Library\User\usecase\UserDelete;

use App\Library\User\User;
use App\Library\User\usecase\UserDelete\UserDeletePort;

//usecase
class UserDelete
{
    public function __construct(UserDeletePort $port)
    {
        $this->port = $port;
    }

    public function execute(User $user): bool
    {
        return $this->port->delete($user);
    }

}
