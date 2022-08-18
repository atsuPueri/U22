<?php
namespace App\Library\User\usecase;

use App\Library\User\usecase\SignInPort;

class SignIn
{
    private SignInPort $port;
    public function __construct(SignInPort $port)
    {
        $this->port = $port;
    }

    public function execute(string $id, string $password): ?User
    {
        return $this->port->signin($id, $password);
    }
}
