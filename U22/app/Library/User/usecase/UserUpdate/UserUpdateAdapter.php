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
     * ユーザー情報更新。
     */
    public function update(User $user): bool
    {
        $is_shop = $user->get_is_shop();
        if($is_shop == 0){
            $sqlUpdate = DB::table('user_general')
            ->join('user', 'user_general.id', '=', 'user.id')
            ->where('user_general.id', ':id')
            ->update(
                ['user.password' => ':password'],
                ['user.login_way' => ':login_way'],
                ['user.image_name' => ':image_name'],
                ['user_general.real_name' => ':real_name'],
                ['user_general.display_name' => ':display_name']
            );
        }elseif($is_shop == 1){
            $sqlUpdate = DB::table('user_shop')
            ->join('user', 'user_shop.id', '=', 'user.id')
            ->where('user_shop.id', ':id')
            ->update(
                ['user.password' => ':password'],
                ['user.login_way' => ':login_way'],
                ['user.image_name' => ':image_name'],
                ['user_shop.shop_name' => ':shop_name'],
                ['user_shop.address' => ':address']
            );
        }
        return $sqlUpdate !== 0;
    }

}