<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Chat\usecase\GetChatMessage\GetChatMessage;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoom;
use App\Library\Chat\ChatRoom;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoomAdapter;
use App\Library\Helper\GetNowLoginUser;
use Illuminate\Support\Collection;

class UserChatListController extends Controller
{
    public function show()
    {
        /** @var GetNowLoginUser */
        $GetUser = new GetNowLoginUser();

        /** @var UserGeneral */
        $user = $GetUser->get(GetNowLoginUser::TYPE_GENERAL);

        if (null === $user) {
            return redirect('/login/mailLogin');
        }

        /** @var GetChatRoom */
        $GetChatRoom = \resolve(GetChatRoom::class);

        $room_array  = $GetChatRoom->get_all($user->id, GetChatRoom::USER_TYPE_GENERAL);

        $map = collect($room_array)->map(function (ChatRoom $ChatRoom) {

            /** @var GetChatMessage */
            $GetChatMessage = \resolve(GetChatMessage::class);

            $user_shop =  $ChatRoom->to_UserShop();
            return [
                'managerId' => $user_shop->id,
                'managerImgName' => $user_shop->icon_name,
                'shopName' => $user_shop->shop_name, //店名

                'comment' => $GetChatMessage->get_last($ChatRoom->room_id, GetChatMessage::SEND_TYPE_SHOP), //最新のコメント表示
                'commentNum' => count($GetChatMessage->get_all($ChatRoom->room_id)), //コメント数
            ];
        });

        return view('user/userChatList', [
            "chatList" => $map->all(),
            'menu' => [
                'chat' => ['img' => 'chatCheck.png', 'name' => 'check'],
                'search' => ['img' => 'search.png', 'name' => 'notCheck'],
                'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
            ] //メニューバー関連の配列選択されてるページだと画像名にCheckが入る
        ]);
    }
}
