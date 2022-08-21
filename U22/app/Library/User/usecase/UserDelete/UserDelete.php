<?php
namespace App\Library\User\usecase\UserUpdate;

use Illuminate\Support\Facades\DB;
use App\Library\User\UserGeneral;
use App\Library\User\UserShop;

//アダプタでやる
class UserDelete
{
    /**
     * ユーザー情報削除。
     */
    public function delete(array $user): bool
    {
        if($user instanceof UserGeneral){
            $sqlDelete = DB::table('user_general')
                ->join('user', 'user_general.id', '=', 'user.id')
                ->where('user_general.id', ':id')
                ->delete();
        }elseif($user instanceof UserShop){
            $sqlUpdate = DB::table('user_shop')
                ->join('user', 'user_shop.id', '=', 'user.id')
                ->where('user_shop.id', ':id')
            ->delete();
        }
    }

}