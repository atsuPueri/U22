<?php

namespace App\Library\Chat;

use App\Library\User\UserGeneral;
use App\Library\User\UserShop;
use Illuminate\Support\Facades\DB;

class ChatRoom
{
    private int $room_id;
    private int $general_id;
    private int $shop_id;
    public function __construct(int $room_id, int $general_id, int $shop_id)
    {
        $this->room_id = $room_id;
        $this->general_id = $general_id;
        $this->shop_id = $shop_id;
    }

    public function to_UserGeneral(): UserGeneral
    {
        $result = DB::table('users_general')
            ->where('id', '=', $this->general_id)
            ->get();
        return new UserGeneral($result->all());
    }

    public function to_UserShop(): UserShop
    {
        $result = DB::table('users_general')
            ->where('id', '=', $this->general_id)
            ->get();
        return new UserShop($result->all());
    }
}
