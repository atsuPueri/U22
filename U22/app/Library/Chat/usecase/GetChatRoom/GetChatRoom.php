<?php

namespace App\Library\Chat\usecase\GetChatRoom;

use App\Library\Chat\ChatRoom;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoomPort;

class GetChatRoom
{
    const USER_TYPE_SHOP = 0;
    const USER_TYPE_GENERAL = 1;

    private GetChatRoomPort $port;

    public function __construct(GetChatRoomPort $port)
    {
        $this->port = $port;
    }

    /**
     * @return array<ChatRoom>
     */
    public function get_all(int $user_id, int $user_type): array
    {
        return $this->port->get_all($user_id, $user_type);
    }
}
