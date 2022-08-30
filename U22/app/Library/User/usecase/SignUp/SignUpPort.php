<?php
namespace App\Library\User\usecase\SignUp;

use App\Library\User\User;

interface SignUpPort
{
    public function signup(User $user): bool;
}