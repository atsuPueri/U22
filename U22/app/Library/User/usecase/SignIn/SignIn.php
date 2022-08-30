<?php
namespace App\Library\User\usecase\SignIn;

use App\Library\User\User;
use App\Library\User\usecase\SignIn\SignInPort;

class SignIn
{
    public function __construct(SignInPort $port)
    {
        $this->port = $port;
    }

    public function execute(User $user): bool
    {
        return $this->port->signin($user);
    }
}