<?php

namespace App\Library\Chat;

class ChatMessage
{
    private int $chat_room_id;
    private int $send_type;
    private string $message;
    private int $send_date_timestamp;
    
    public function __construct(int $chat_room_id, int $send_type, string $message, int $send_date_timestamp)
    {
        $this->chat_room_id = $chat_room_id;
        $this->send_type = $send_type;
        $this->message = $message;
        $this->send_date_timestamp = $send_date_timestamp;
    }
}
