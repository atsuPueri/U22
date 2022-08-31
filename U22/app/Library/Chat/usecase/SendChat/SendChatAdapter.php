<?php
namespace App\Library\Chat\usecase\SendChat;

use App\Library\Chat\ChatMessage;
use App\Library\Chat\usecase\SendChat\SendChatPort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendChatAdapter implements SendChatPort
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function save_message(int $send_room, int $user_id, int $send_type, string $send_name): void
    {
        $request = $this->request;
        $message = $request->input($send_name);

        if ($message !== '') {
            DB::table('chat_message')->insert([
                'chat_room_id' => $send_room,
                'send_type' => $send_type,
                'message' => $message,
                'send_date' => time(),
            ]);
        }
    }

    public function save_image(int $send_room, int $user_id, int $send_type, string $file_name): void
    {
        $request = $this->request;

        if ($request->hasFile($file_name)) {
            $file = $request->file($file_name);

            if ($send_type === ChatMessage::SEND_TYPE_GENERAL_IMAGE) {
                $user = 'user';
            } elseif ($send_type === ChatMessage::SEND_TYPE_SHOP_IMAGE) {
                $user = 'shop';
            } else {
                return;
            }
            $path = $file->store("images\{$user}\\", 'public');

            DB::table('chat_message')->insert([
                'chat_room_id' => $send_room,
                'send_type' => $send_type,
                'message' => $path,
                'send_date' => time(),
            ]);
        }
    }
}
