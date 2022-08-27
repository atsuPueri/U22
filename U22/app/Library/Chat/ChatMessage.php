<?php

namespace App\Library\Chat;

class ChatMessage
{
    public int $send_type;
    public string $message;
    public int $send_date_timestamp;

    public function __construct(int $send_type, string $message, int $send_date_timestamp)
    {
        $this->send_type = $send_type;
        $this->message = $message;
        $this->send_date_timestamp = $send_date_timestamp;
    }
}
