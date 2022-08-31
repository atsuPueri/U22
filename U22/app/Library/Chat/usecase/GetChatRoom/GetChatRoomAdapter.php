<?php
namespace App\Library\Chat\usecase\GetChatRoom;

use App\Library\Chat\ChatRoom;
use Illuminate\Support\Facades\DB;

class GetChatRoomAdapter implements GetChatRoomPort
{
    public function get_all(int $user_id, int $user_type): array
    {
        $db = DB::table('chat_room');
        if ($user_type === GetChatRoom::USER_TYPE_GENERAL) {
            $db->where('user_general_id', '=', $user_id);
        } elseif ($user_type === GetChatRoom::USER_TYPE_SHOP) {
            $db->where('user_shop_id', '=', $user_id);
        } else {
            return [];
        }

        $result = $db->get();
        $map = $result->map(function ($value) {
            new ChatRoom($value->id, $value->user_general_id, $value->user_shop_id);
        });

        return $map->all();
    }

    public function get_room(int $id): ?ChatRoom
    {
        $result = DB::table('chat_room')
            ->where('id', '=', $id)
            ->first();

        if (null === $result) {
            return null;
        }
        return new ChatRoom($result->id, $result->user_general_id, $result->user_shop_id);
    }

}
