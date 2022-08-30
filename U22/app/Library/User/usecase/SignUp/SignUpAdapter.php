<?php
namespace App\Library\User\usecase\SignUp;

use App\Library\User\usecase\SignUp\SignUpPort;
use Illuminate\Support\Facades\DB;

class SignUpAdapter implements SignUpPort
{
    public function signup(array $user_info, int $type): void
    {
        $table = '';
       if (SignUp::USER_TYPE_GENERAL === $type) {
            $table = 'user_general';
        } elseif (SignUp::USER_TYPE_SHOP === $type) {
            $table = 'user_shop';
        } else {
            return;
        }
        $user_info['password'] = \password_hash($user_info['password'], \PASSWORD_DEFAULT);
        DB::table($table)->insert($user_info);
    }
}
