<?php
namespace App\Library\User\usecase\SignIn;

use App\Library\User\usecase\SignIn\SignInPort;
use App\Library\User\User\User;
use App\Library\User\User\UserGeneral;
use App\Library\User\User\UserShop;
use Illminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignInAdapter implements SignInPort
{
    public function signin(string $phone_number,string $password): ?User
    {
        $user = DB::table('user')
            ->where('phone_number', '=', $phone_number)
            ->get();

        $real_password = $user["password"];

        if (Hash::check($real_password, $password)) {
            // 一致したときの処理
            $id = $user["id"];
            $password = $user["password"];
            $login_token = $user["login_token"];
            $expiration_date = $user["expiration_date"];
            $status = $user["status"];
            $is_shop = $user["is_shop"];
            $image_name = $user["image_name"];
            $phone_number = $user["phone_number"];
            $mail_address = $user["mail_address"];

            if($user["is_shop"] == 0){
                //ユーザー側
                $user = DB::table('user_general')
                ->where('id', '=', $id)
                ->get();
    
                $real_name = $user["real_name"];
                $display_name = $user["display_name"];

                $user = new UserGeneral();
                $user->set_id($id);
                $user->set_password($password);
                $user->set_login_token($login_token);
                $user->set_expiration_date($expiration_date);
                $user->set_status($status);
                $user->set_is_shop($is_shop);
                $user->set_image_name($image_name);
                $user->set_phone_number($phone_number);
                $user->set_mail_address($mail_address);
                $user->set_real_name($real_name);
                $user->set_display_name($display_name);
            }else{
                //店舗側
                $user = DB::table('user_shop')
                ->where('id', '=', $id)
                ->get();

                $shop_name = $user["shop_name"];
                $address = $user["address"];

                $user = new UserShop();
                $user->set_id($id);
                $user->set_password($password);
                $user->set_login_token($login_token);
                $user->set_expiration_date($expiration_date);
                $user->set_status($status);
                $user->set_is_shop($is_shop);
                $user->set_image_name($image_name);
                $user->set_phone_number($phone_number);
                $user->set_mail_address($mail_address);
                $user->set_shop_name($shop_name);
                $user->set_address($address);
            }
        } else {
            // 一致しなかったときの処理
            $user = null;
        }
        return $user;
    }

}