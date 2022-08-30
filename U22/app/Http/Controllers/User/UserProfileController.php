<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Helper\GetNowLoginUser;

class userProfileController extends Controller
{
    public function show()
    {
        $GetNowUser = new GetNowLoginUser();
        $user = $GetNowUser->get(GetNowLoginUser::TYPE_GENERAL);

        return view('user/userProfile' , [
            'userImg' => 'uchuneko.png',//画像名
            'userName' => 'uchuneko',//ユーザー名
            'userMail' => 'uchuneko@gmail.com',//ユーザー名
            'userTell' => '00000000000',//電話番号
            'userId' => '0',//ユーザーID(いるかわからんけど一応)
            'userPass' => '•••••••••'//パスワード(伏字になってる)
        ]);
    }

}
