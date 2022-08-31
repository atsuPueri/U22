<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Library\Helper\GetNowLoginUser;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoom;
use App\Library\Chat\usecase\GetChatMessage\GetChatMessage;
use App\Library\Chat\ChatRoom;

class ManagerChatListControler extends Controller
{
    public function show()
    {
        /** @var GetNowLoginUser */
        $GetUser = new GetNowLoginUser();

        /** @var UserGeneral */
        $user = $GetUser->get(GetNowLoginUser::TYPE_SHOP);

        if (null === $user) {
            return redirect('/login/mailLogin');
        }

        /** @var GetChatRoom */
        $GetChatRoom = \resolve(GetChatRoom::class);

        $room_array  = $GetChatRoom->get_all($user->id, GetChatRoom::USER_TYPE_SHOP);

        $map = collect($room_array)->map(function (ChatRoom $ChatRoom) {

            /** @var GetChatMessage */
            $GetChatMessage = \resolve(GetChatMessage::class);

            $user =  $ChatRoom->to_UserGeneral();
            return [
                'userId' => $user->id,
                'userImgName' => $user->icon_name,
                'userName' => $user->display_name, //店名

                'comment' => $GetChatMessage->get_last($ChatRoom->room_id, GetChatMessage::SEND_TYPE_SHOP), //最新のコメント表示
            ];
        });

        return view('manager/managerChatList' , [
            "chatList" => [//チャット一覧の配列
                [
                    'userId' => 0,//ユーザーID(多分ページ遷移するときに使うかな？)
                    'userImgName' => 'uchuneko.png',//ユーザーのプロフィール画像名
                    'userName' => '宇宙猫',//ユーザー名
                    'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
                ],
                [
                    'userId' => 1,//ユーザーID(多分ページ遷移するときに使うかな？)
                    'userImgName' => 'uchuneko.png',//ユーザーのプロフィール画像名
                    'userName' => '宇宙猫',//ユーザー名
                    'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
                ]
            ],
            'menu' => [
                'chat' => ['img' => 'chatCheck.png', 'name' => 'check'],
                'lostList' => ['img' => 'lost.png', 'name' => 'notCheck'],
                'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
            ]//メニューバー関連の配列選択されてるページだと画像名にCheckが入る

        ])
    }

}
