<?php
namespace App\Library\Chat\usecase\SendChat;

interface SendChatPort
{
    public function save_message(int $send_room, int $user_id, int $send_type, string $send_name): void;
    public function save_image(int $send_room, int $user_id, int $send_type, string $file_name): void;

}
