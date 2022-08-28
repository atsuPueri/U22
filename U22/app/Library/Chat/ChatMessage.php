<?php

namespace App\Library\Chat;

class ChatMessage
{
    const SEND_TYPE_GENERAL_MASSAGE = 0;
    const SEND_TYPE_SHOP_MASSAGE = 1;
    const SEND_TYPE_GENERAL_IMAGE = 2;
    const SEND_TYPE_SHOP_IMAGE = 3;

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
