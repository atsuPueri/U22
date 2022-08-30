<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Helper\GetNowLoginUser;
use App\Library\User\UserGeneral;

class UserProfileEditController extends Controller
{
    public function show()
    {
        /** @var GetNowLoginUser */
        $GetUser = new GetNowLoginUser();
        /** @var UserGeneral */
        $user = $GetUser->get(GetNowLoginUser::TYPE_GENERAL);

        if (null === $user) {
            \redirect('/login/mailLogin');
        }

        return view('user/userProfileEdit' , [
            'edit' => [//valueが情報,errMsgがエラー文
                'account' => ['value' => $user->real_name , 'errMsg' => ''],//アカウント名
                'mail' => ['value' => $user->mail_address , 'errMsg' => ''],//メアド
                'tell' => ['value' => $user->phone_number , 'errMsg' => ''],//電話番号
                'pass' => ['value' => '' , 'errMsg' => ''],//パスワード
                'icon' => ['value' => '' , 'errMsg' => '']//アイコン
            ]
        ]);
    }
}
