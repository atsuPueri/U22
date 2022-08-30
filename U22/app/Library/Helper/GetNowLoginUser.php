<?php

namespace App\Library\Helper;

use App\Library\User\User;
use App\Library\User\UserGeneral;
use App\Library\User\UserShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetNowLoginUser
{
    const TYPE_GENERAL = 0;
    const TYPE_SHOP = 1;

    public function get(int $type): ?User
    {
        $table = '';
        if (self::TYPE_SHOP === $type) {
            $table = 'user_shop';
        } elseif (self::TYPE_GENERAL === $type) {
            $table = 'user_general';
        } else {
            return null;
        }
        /** @var Request */
        $request = \resolve(Request::class);
        $token = $request->cookie('login_token', null);
        if ($token === null) {
            return null;
        }

        $result = DB::table($table)
            ->where('login_token', '=', $token)
            ->first();

        if (null === $result->id) {
            return null;
        }

        $result = DB::table($table)
            ->where('id', '=', $result->id)
            ->first();

        if (self::TYPE_GENERAL === $type) {
            return new UserGeneral((array)$result);
        } elseif (self::TYPE_SHOP === $type) {
            return new UserShop((array)$result);
        } else {
            return null;
        }
    }
}
