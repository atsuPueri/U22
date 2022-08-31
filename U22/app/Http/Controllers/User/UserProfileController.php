<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Helper\GetNowLoginUser;
use App\Library\User\UserGeneral;

class userProfileController extends Controller
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

        return view('user/userProfile' , [
            'userImg' => $user->icon_name,
            'userName' => $user->display_name,
            'userMail' => $user->mail_address,
            'userTell' => $user->phone_number,
            'userPass' => '•••••••••'//パスワード(伏字になってる)
        ]);
    }

}
