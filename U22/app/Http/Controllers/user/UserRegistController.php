<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\User\usecase\SignUp\SignUp;

class UserRegistController extends Controller
{
    public function show()
    {
        /** @var SignUp */
        $SignUp = \resolve(SignUp::class);

        $SignUp->execute([
            'phone_number' => \session('tel'),
            'mail_address' => \session('mail'),
            'password' => \session('password'),
            'login_token' => 'notfound',
            'expiration_date' => -1,
            'status' => 1,
            'icon_name' => '',
            'real_name' => \session('name'),
            'display_name' => bin2hex(random_bytes(10))
        ], SignUp::USER_TYPE_GENERAL);

        return view('user/userRegist');
    }
}
