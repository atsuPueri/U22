<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Chat\ChatMessage;
use App\Library\Chat\usecase\GetChatMessage\GetChatMessage;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoom;
use App\Library\Helper\GetNowLoginUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class UserChatController extends Controller
{
    public function show(Request $request)
    {
        /** @var GetNowLoginUser */
        $GetUser = new GetNowLoginUser();

        /** @var UserGeneral */
        $user = $GetUser->get(GetNowLoginUser::TYPE_GENERAL);
        if (null === $user) {
            return redirect('/login/mailLogin');
        }

        $userShop_id = $request->input('user_id') ?? \session('room_id');
        $rs = DB::table('chat_room')
            ->where('user_shop', '=', $userShop_id)
            ->where('user_general_id', '=', $user->id)
            ->first();

        // なかった時に作る
        if ($rs === null) {
            $chat_room_id = DB::table('chat_room')->insertGetId([
                'user_general_id' => $user->id,
                'user_shop_id' => $userShop_id
            ]);
        }
        $chat_room_id = $chat_room_id;
        $request->session()->flash('room_id', $chat_room_id);

        if ($chat_room_id === null) {
            return \redirect('/user/userChatList');
        }

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

    public function send(Request $request)
    {
        /** @var SendChat */
        $Send = \resolve(SendChat::class);

        /** @var GetNowLoginUser */
        $GetUser = new GetNowLoginUser();

        /** @var UserGeneral */
        $user = $GetUser->get(GetNowLoginUser::TYPE_GENERAL);
        if (null === $user) {
            return redirect('/login/mailLogin');
        }

        $chat_room_id = \session('room_id');
        if (null !== $chat_room_id) {

            $Send->save_image($chat_room_id, $user->id, 3, 'chatImg');
            $Send->save_message($chat_room_id, $user->id, 1, 'chatComment');
        }

        return \redirect('/user/userChat')
            ->with('room_id', $chat_room_id);
    }
}
