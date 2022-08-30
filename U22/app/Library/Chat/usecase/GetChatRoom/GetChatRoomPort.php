<?php

namespace App\Library\Chat\usecase\GetChatRoom;

interface GetChatRoomPort
{
    public function get_all(int $user_id, int $user_type): array;
}
