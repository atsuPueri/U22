<?php
namespace App\Library\Chat\usecase\SendChat;

use App\Library\Chat\usecase\SendChat\SendChatPort;
use Illuminate\Http\Request;

class SendChatAdapter implements SendChatPort
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function save_message(int $user_id, int $send_type, string $message): void
    {
        
    }

    public function save_image(): void
    {

    }

}
