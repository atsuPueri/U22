<?php
namespace App\Library\Chat\usecase\SendChat;

class SendChat
{
    private SendChatPort $port;

    public function __construct(SendChatPort $port)
    {
        $this->port = $port;
    }

    public function save_message(int $send_room, int $user_id, int $send_type, string $send_name): void
    {
        $this->port->save_message($send_room, $user_id, $send_type, $send_type);
    }

    public function save_image(int $send_room, int $user_id, int $send_type, string $file_name): void
    {
        $this->port->save_image($send_room, $user_id, $send_type, $file_name);
    }
}
