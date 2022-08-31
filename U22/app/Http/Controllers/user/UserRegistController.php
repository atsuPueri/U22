<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\User\usecase\SignUp\SignUp;

class UserRegistController extends Controller
{
    public function show()
    {


        $add_user_info = [
            'phone_number' => \session('tel'),
            'mail_address' => \session('mail'),
            'password' => \session('password'),
            'login_token' => 'notfound',
            'expiration_date' => -1,
            'status' => 1,
            'icon_name' => '',
        ];

        if (\session('profession') === 'user') {
            $add_user_info['real_name'] = \session('name');
            $add_user_info['display_name'] = bin2hex(random_bytes(10));
        } elseif (\session('profession') === 'manager') {
            $add_user_info['shop_name'] = \session('shop_name');
            $add_user_info['address'] = \session('address');
        }
        
        /** @var SignUp */
        $SignUp = \resolve(SignUp::class);
        $SignUp->execute($add_user_info, SignUp::USER_TYPE_GENERAL);

        return view('user/userRegist');
    }
}
