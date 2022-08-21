<?php
namespace App\Library\User\usecase\UserDelete;

use App\Library\User\usecase\UserDelete\UserDeletePort;
use App\Library\User\User;
use Illuminate\Support\Facades\DB;
use App\Library\User\UserGeneral;
use App\Library\User\UserShop;

class UserDeleteAdapter implements UserDeletePort
{
    public function delete(User $user): bool
    {
        if($user instanceof UserGeneral){
            $sqlDelete = DB::table('user_general')
            ->join('user', 'user_general.id', '=', 'user.id')
            ->where('user_general.id', ':id')
            ->delete();
        }elseif($user instanceof UserShop){
            $sqlDelete = DB::table('user_shop')
            ->join('user', 'user_shop.id', '=', 'user.id')
            ->where('user_shop.id', ':id')
            ->delete();
        }
        return $sqlDelete !== 0;
    }
}
