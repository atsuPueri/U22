<?php

namespace App\Library\User\usecase\SignIn;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class SignInAdapter implements SignInPort
{
    public function signin_phone(string $phone_number, string $password, int $type): bool
    {
        return $this->signin($phone_number, $password, $type, 'phone_number');
    }

    public function signin_mail(string $mail_address, string $password, int $type): bool
    {
        return $this->signin($mail_address, $password, $type, 'mail_address');
    }

    private function signin (string $login_id, string $password, int $type, string $column)
    {
        $table = '';
        if (SignIn::USER_TYPE_SHOP === $type) {
            $table = 'user_shop';
        } elseif (SignIn::USER_TYPE_GENERAL === $type) {
            $table = 'user_general';
        } else {
            return false;
        }

        $result = DB::table($table)
            ->where($column, '=', $login_id)
            ->first();

        if (null !== $result &&  password_verify($password, $result->password)) {

            $token = bin2hex(random_bytes(10));

            DB::table($table)
                ->where('id', '=', $result->id)
                ->update([
                    'login_token' => $token,
                    'expiration_date' => time () + (60 * 60),
                ]);

            Cookie::queue('login_token', $token, 3);
            return true;
        }
        return false;
    }
}
