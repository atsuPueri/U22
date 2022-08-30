<?php

namespace App\Library\User\usecase\SignIn;

interface SignInPort
{
    public function signin_phone(string $phone_number, string $password, int $type): bool;
    public function signin_mail(string $mail_address, string $password, int $type): bool;
}
