<?php
namespace App\Library\User;
use App\Library\User\User;

class UserGeneral extends User
{
    public string $real_name;
    public string $display_name;

    public function __construct(array $user_info)
    {
        parent::__construct($user_info);
        $this->real_name = $user_info["real_name"];
        $this->display_name = $user_info["display_name"];
    }
}
