<?php
namespace App\Library\Chat\usecase\GetChatMessage;

use App\Library\Chat\ChatMessage;
use Illuminate\Support\Facades\DB;

class GetChatMessageAdapter implements GetChatMessagePort
{
    public function get_all(int $chat_room_id): array
    {
        $result = DB::table('chat_message')
            ->where('chat_room_id', '=', $chat_room_id)
            ->get();
        $map = $result->map(function ($val) {
            return new ChatMessage($val->send_type, $val->message, $val->send_date);
        });
        return $map->all();
    }

    public function get_last(int $chat_room_id, int $type): ChatMessage
    {
        $max_send_date = DB::table('chat_message')
            ->where('chat_room_id', '=', $chat_room_id)
            ->where('send_type', '=', $type)
            ->max('send_date');

        $result = DB::table('chat_message')
            ->where('chat_room_id', '=', $chat_room_id)
            ->where('send_type', '=', $type)
            ->where('send_date', '=', $max_send_date)
            ->first();

        return new ChatMessage(
            $result->send_type,
            $result->message,
            $result->send_date
        );
    }

}
