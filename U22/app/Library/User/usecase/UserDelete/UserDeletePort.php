<?php
namespace App\Library\User\usecase\UserDelete;

use App\Library\User\User;

interface UserDeletePort
{
    public function delete(User $user): bool;
}
