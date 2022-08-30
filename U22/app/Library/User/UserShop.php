<?php
namespace App\Library\User;
use App\Library\User\User;

class UserShop extends User
{
    public int $shop_name;
    public string $address;

    public function __construct(array $user_info)
    {
        parent::__construct($user_info);
        $this->shop_name = $user_info["shop_name"];
        $this->address = $user_info["address"];
    }
}
