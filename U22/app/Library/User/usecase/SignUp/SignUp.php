<?php
namespace App\Library\User\usecase\SignUp;

use App\Library\User\User;
use App\Library\User\usecase\SignUp\SignUpPort;

class SignUp
{
    public function __construct(SignUpPort $port)
    {
        $this->port = $port;
    }

    public function execute(User $user): bool
    {
        return $this->port->signup($user);
    }
}