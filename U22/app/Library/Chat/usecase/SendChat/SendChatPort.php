<?php
namespace App\Library\Chat\usecase\SendChat;

interface SendChatPort
{
    public function save_message(int $user_id, int $send_type, string $message): void;
    public function save_image(): void;

}
