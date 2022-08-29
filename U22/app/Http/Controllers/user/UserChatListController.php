<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Chat\usecase\GetChatMessage\GetChatMessage;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoom;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoomAdapter;
use Illuminate\Support\Collection;

class UserChatListController extends Controller
{
    public function show()
    {
        /** @var GetChatMessage */
        // $GetChatMessage = \resolve(GetChatMessage::class);
        // $GetChatRoom = new GetChatRoom(new GetChatRoomAdapter);

        /** @var GetChatRoom */
        $GetChatRoom = \resolve(GetChatRoom::class);

        $room_array  = $GetChatRoom->get_all(1, GetChatRoom::USER_TYPE_GENERAL);

        $map = collect($room_array)->map(function ($ChatRoom) {

            $user_general =  $ChatRoom->to_UserGeneral();
            return [
                'managerId' => $user_general->get_id(),
                'managerImgName' => 'kizoku.png',
                'shopName' => '鳥貴族',//店名
                'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
                'commentNum' => '1',//コメント数
            ];
        });

        return view('user/userChatList' , [
            "chatList" => [//チャット一覧の配列
                [
                    'managerId' => 0,//店のID(多分ページ遷移するときに使うかな？)
                    'managerImgName' => 'kizoku.png',//店のプロフィール画像名
                    'shopName' => '鳥貴族',//店名
                    'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
                    'commentNum' => '1',//コメント数
                ],
                [
                    'managerId' => 1,//店のID(多分ページ遷移するときに使うかな？)
                    'managerImgName' => 'kizoku.png',//店のプロフィール画像名
                    'shopName' => '鳥貴族',//店名
                    'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
                    'commentNum' => '1',//コメント数
                ]
            ],
            'menu' => [
                'chat' => ['img' => 'chatCheck.png', 'name' => 'check'],
                'search' => ['img' => 'search.png', 'name' => 'notCheck'],
                'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
            ]//メニューバー関連の配列選択されてるページだと画像名にCheckが入る
        ]);
    }

}
