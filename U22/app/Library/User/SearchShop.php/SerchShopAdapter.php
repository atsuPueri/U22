<?php

namespace App\Library\User\SearchShop;

use App\Library\User\UserShop;
use Illuminate\Support\Facades\DB;

class SearchShopAdapter implements SearchShopPort
{
    public function execute(array $serch_info): UserShop
    {
        $db = DB::table('users_shop');

        $func = function ($column, $op, $fn) use (&$db, $serch_info)
        {
            if (array_key_exists($column, $serch_info)) {
                if ($fn($serch_info[$column])) {
                    $db->where($column, $op, $serch_info[$column], 'or');
                }
            }
        };

        $func('id', '=', 'is_int');
        $func('group_id','=', 'is_int');
        $func('shop_name','=', 'is_string');
        if (array_key_exists('address', $serch_info)) {
            if (is_string($serch_info['address'])) {
                $address = $serch_info['address'];
                $db->where('address', 'LIKE', "%$address%");
            }
        }
        $all = $db->get()->all();
        return new UserShop($all);
    }
}
