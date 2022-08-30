<?php

namespace App\Library\Chat\usecase\GetChatMessage;

use App\Library\Chat\ChatMessage;

interface GetChatMessagePort
{
    public function get_all(int $chat_room_id): array;
    public function get_last(int $chat_room_id, int $type): ChatMessage;
}
