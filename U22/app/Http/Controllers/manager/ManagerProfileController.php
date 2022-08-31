<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Library\Helper\GetNowLoginUser;
use App\Library\User\UserGeneral;

class ManagerProfileController extends Controller
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

        return view('manager/managerProfile' , [
            'managerImg' => $user->icon_name,
            'managerName' => $user->shop_name,
            'managerMail' => $user->mail_address,
            'managerTell' => $user->phone_number,
            'managerAddress' => $user->phone_number,
            'managerId' => $user->address,
            'managerPass' => '•••••••••'//パスワード(伏字になってる)
        ]);
    }

}
