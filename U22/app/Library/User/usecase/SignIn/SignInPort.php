<?php
namespace App\Library\User\usecase\SignIn;

use App\Library\User\User;

interface SignInPort
{
    public function signin(User $user): bool;
}