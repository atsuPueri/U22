<?php
namespace App\Library\User;
use App\Library\User\User;

class UserGeneral extends User
{
    private string $display_name;

    /**
     * @param array{
     *      display_name: string,
     * }
     */
    public function __construct(array $user_info)
    {
        parent::__construct($user_info);
        $this->display_name = $user_info["display_name"];
    }


    // 以下アクセサメソッド。
    public function get_display_name(): ?string
    {
        return $this->display_name;
    }
    public function set_display_name(string $display_name): void
    {
        $this->display_name = $display_name;
    }
}