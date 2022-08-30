<?php

namespace App\Library\User;

abstract class User
{
    public int $id;
    public string $phone_number;
    public string $mail_address;
    public string $password;
    public string $login_token;
    public int $expiration_date;
    public int $status;
    public string $icon_name;

    public function __construct(array $user_info)
    {
        $this->id = $user_info["id"];
        $this->phone_number = $user_info["phone_number"];
        $this->mail_address = $user_info["mail_address"];
        $this->password = $user_info["password"];
        $this->login_token = $user_info["login_token"];
        $this->expiration_date = $user_info["expiration_date"];
        $this->status = $user_info["status"];
        $this->icon_name = $user_info["icon_name"];
    }
}
