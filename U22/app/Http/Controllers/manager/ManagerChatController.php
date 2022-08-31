<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Chat\ChatMessage;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoom;
use App\Library\Chat\usecase\SendChat\SendChat;
use App\Library\Chat\usecase\SendChat\SendChatAdapter;
use App\Library\Helper\GetNowLoginUser;

class ManagerChatController extends Controller
{
    public function show(Request $request)
    {
        $chat_room_id = $request->input('');
        $request->session()->flash('room_id', $chat_room);

        /** @var GetChatRoom */
        $GetChatRoom = \resolve(GetChatRoom::class);
        $chat_room = $GetChatRoom->get_room($chat_room_id);

        /** @var GetChatMessage */
        $GetChatMessage = \resolve(GetChatMessage::class);
        $message_array = $GetChatMessage->get_all($chat_room_id);

        $map = \collect($message_array)->map(function (ChatMessage $item) {
            $type = '';
            switch ($item->send_type) {
                case ChatMessage::SEND_TYPE_GENERAL_IMAGE:
                    $type = 'userImgComment';
                    break;
                case ChatMessage::SEND_TYPE_GENERAL_MASSAGE:
                    $type = 'userComment';
                    break;
                case ChatMessage::SEND_TYPE_SHOP_IMAGE:
                    $type = 'managerImgComment';
                    break;
                case ChatMessage::SEND_TYPE_SHOP_MASSAGE:
                    $type = 'managerComment';
            }
            return ['comment' => $item->message, 'who' => $type];
        });

        $user = $chat_room->to_UserGeneral();
        return view('manager/managerChat' , [
            'userImgName' => $user->icon_name,//ユーザーのプロフィール画像名
            'userName' => $user->display_name,//ユーザー名
            'chat' => $map->all(),//コメントは二次元配列で、画像はcommentに画像名を、whoはclassを書くとき用(ユーザー：userComment , 店：managerComment , ユーザー画像：userImgComment , 店画像：managerImgComment)
        ]);
    }

    public function send(Request $request)
    {
        /** @var SendChat */
        $Send = \resolve(SendChat::class);

        /** @var GetNowLoginUser */
        $GetUser = new GetNowLoginUser();
        /** @var UserGeneral */
        $user = $GetUser->get(GetNowLoginUser::TYPE_SHOP);
        if (null === $user) {
            return redirect('/login/mailLogin');
        }

        $chat_room_id = \session('room_id');
        if (null !== $chat_room_id) {

            $Send->save_image($chat_room_id, $user->id, 2, 'chatImg');
            $Send->save_message($chat_room_id, $user->id, 0, 'chatComment');
        }
        return $this->show($request);
    }
}
