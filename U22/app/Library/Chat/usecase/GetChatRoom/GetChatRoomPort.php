<?php

namespace App\Library\Chat\usecase\GetChatRoom;

use App\Library\Chat\ChatRoom;

interface GetChatRoomPort
{
    public function get_all(int $user_id, int $user_type): array;
    public function get_room(int $id): ?ChatRoom;
}
