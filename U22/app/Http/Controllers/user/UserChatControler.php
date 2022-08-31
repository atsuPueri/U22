<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Chat\ChatMessage;
use App\Library\Chat\usecase\GetChatMessage\GetChatMessage;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoom;
use Illuminate\Http\Request;

class UserChatController extends Controller
{
    public function show(Request $request)
    {
        $chat_room_id = $request->input('');

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

        $shop = $chat_room->to_UserShop();
        return view('user/userChat' , [
            'managerImgName' => $shop->icon_name,//店のプロフィール画像名
            'managerName' => $shop->shop_name,//店名
            'chat' => $map->all(),//コメントは二次元配列で、画像はcommentに画像名を、whoはclassを書くとき用(ユーザー：userComment , 店：managerComment , ユーザー画像：userImgComment , 店画像：managerImgComment)
        ]);
    }

}
