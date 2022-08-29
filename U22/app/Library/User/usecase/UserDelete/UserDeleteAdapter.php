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
         * 論理削除
         */
        $sql_delete = DB::table('user_general')
        ->where('id', $id)
        ->update(['status' => 1]);

        return $sql_delete !== 0;
    }

}