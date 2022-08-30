<?php

namespace App\Library\User\usecase\SignIn;

use App\Library\User\usecase\SignIn\SignInPort;

class SignIn
{
    const USER_TYPE_SHOP = 0;
    const USER_TYPE_GENERAL = 1;

    private SignInPort $port;

    public function __construct(SignInPort $port)
    {
        $this->port = $port;
    }

    public function signin_phone(string $phone_number, string $password, int $type): bool
    {
        return $this->port->signin_phone($phone_number, $password, $type);
    }

    public function signin_mail(string $mail_address, string $password, int $type): bool
    {
        return $this->port->signin_mail($mail_address, $password, $type);
    }
}
