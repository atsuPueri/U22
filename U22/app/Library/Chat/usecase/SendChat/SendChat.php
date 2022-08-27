<?php
namespace App\Library\Chat\usecase\SendChat;

class SendChat
{
    private SendChatPort $port;

    public function __construct(SendChatPort $port)
    {
        $this->port = $port;
    }

    public function save_message(int $user_id, int $send_type, string $message): void
    {
        $this->port->save_message($user_id, $send_type, $message);
    }

    public function save_image(): void
    {
        $this->port->save_image();
    }
}
