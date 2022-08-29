<?php
namespace App\Library\User\usecase\SignUp;

use App\Library\User\usecase\SignUp\SignUpPort;
use App\Library\User\User\User;
use Illminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignUpAdapter implements SignUpPort
{
    /**
     * ユーザー情報登録。
     */
    public function signup(User $user): bool
    {
        $password = Hash::make($user->userPassword);

        $sql_signup = DB::table('user')->insert([
            'password' => $password,
            'phone_number' => ':userTel',
            'mail_address' => ':userMail',
        ]);
        return $sql_signup !== 0;
    }

}