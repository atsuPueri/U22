<?php
namespace App\Library\User\usecase\UserDelete;

use App\Library\User\usecase\UserDelete\UserDeletePort;
use App\Library\User\User\User;
use Illminate\Support\Facades\DB;
use App\Library\User\User\UserGeneral;
use App\Library\User\User\UserShop;

class UserDeleteAdapter implements UserDeletePort
{
    /**
     * ユーザー情報削除。
     */
    public function delete(int $id): bool
    {
        /**
         * @param int is_shop 店舗側かユーザー側か
         */
        $is_shop = DB::table('user')->where('id', $id)->get('is_shop');

        if($is_shop == 0){
            $sql_delete = DB::table('user_general')
            ->where('id', $id)
            ->delete();
            $sql_user_delete = DB::table('user')
            ->where('id', $id)
            ->delete();

        }elseif($is_shop == 1){
            $sql_delete = DB::table('user_shop')
            ->where('id', $id)
            ->delete();
            $sql_user_delete = DB::table('user')
            ->where('id', $id)
            ->delete();
        }
        return $sql_delete !== 0;
    }

}