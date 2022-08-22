<?php
namespace App\Library\User\usecase\UserUpdate;

use App\Library\User\usecase\UserUpdate\UserUpdatePort;
use App\Library\User\User\User;
use Illminate\Support\Facades\DB;
use App\Library\User\User\UserGeneral;
use App\Library\User\User\UserShop;

class UserUpdateAdapter implements UserUpdatePort
{
    /**
     * ユーザー情報削除。
     */
    public function update(User $user): bool
    {
        if($user instanceof UserGeneral){
            $sqlUpdate = DB::table('user_general')
            ->join('user', 'user_general.id', '=', 'user.id')
            ->where('user_general.id', ':id')
            ->update(['user.name' => ':name'],
            ['user.password' => ':password'],
            ['user.login_way' => ':login_way'],
            ['user_general.display_name' => ':display_name']
            );
        }elseif($user instanceof UserShop){
            $sqlUpdate = DB::table('user_shop')
            ->join('user', 'user_shop.id', '=', 'user.id')
            ->where('user_shop.id', ':id')
            ->update(['user.name' => ':name'],
            ['user.password' => ':password'],
            ['user.login_way' => ':login_way'],
            ['user_shop.address' => ':address']
            );
        }
        return $sqlUpdate !== 0;
    }

}