<?php
namespace App\Library\User;
use App\Library\User\User;

class UserGeneral extends User
{
    private string $real_name;
    private string $display_name;

    /**
     * @param array{
     *      real_name: string,
     *      display_name: string
     * }
     */
    public function __construct(array $user_info)
    {
        parent::__construct($user_info);
        $this->real_name = $user_info["real_name"];
        $this->display_name = $user_info["display_name"];
    }


    // 以下アクセサメソッド。
    public function set_real_name(string $real_name): void
    {
        $this->real_name = $real_name;
    }

    public function get_display_name(): ?string
    {
        return $this->display_name;
    }
    public function set_display_name(string $display_name): void
    {
        $this->display_name = $display_name;
    }
}