<?php
namespace App\Library\Chat\usecase\GetChatMessage;

use App\Library\Chat\ChatMessage;
use App\Library\Chat\usecase\GetChatMessage\GetChatMessagePort;

class GetChatMessage
{
    const SEND_TYPE_GENERAL = 0;
    const SEND_TYPE_SHOP = 1;
    private GetChatMessagePort $port;

    public function __construct(GetChatMessagePort $port)
    {
        $this->port = $port;
    }

    public function get_all(int $chat_room_id): array
    {
        return $this->port->get_all($chat_room_id);
    }

    /**
     * $send_type int 取得したい最後のメッセージタイプ
     */
    public function get_last(int $chat_room_id, int $send_type): ChatMessage
    {
        return $this->port->get_last($chat_room_id, $send_type);
    }

}
