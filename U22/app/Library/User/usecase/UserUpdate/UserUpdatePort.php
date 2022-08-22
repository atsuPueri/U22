<?php
namespace App\Library\User\usecase\UserUpdate;

use App\Library\User\User;

interface UserUpdatePort
{
    public function update(User $user): bool;
}