<?php
namespace App\Library\User\usecase\SignUp;

use App\Library\User\User;
use App\Library\User\usecase\SignUp\SignUpPort;

class SignUp
{
    const USER_TYPE_GENERAL = 0;
    const USER_TYPE_SHOP = 1;

    public function __construct(SignUpPort $port)
    {
        $this->port = $port;
    }

    public function execute(array $user_info, int $type): void
    {
        $this->port->signup($user_info, $type);
    }
}
