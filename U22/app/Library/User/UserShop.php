<?php
namespace App\Library\User;
use App\Library\User\User;

class UserShop extends User
{
    private int $shop_id;
    private string $address;

    /**
     * @param array{
     *      shop_id: int,
     *      address: string
     * }
     */
    public function __construct(array $user_info)
    {
        parent::__construct($user_info);
        $this->shop_id = $user_info["shop_id"];
        $this->address = $user_info["address"];
    }


    // 以下アクセサメソッド。
    public function get_shop_id(): ?int
    {
        return $this->shop_id;
    }
    public function set_shop_id(int $shop_id): void
    {
        $this->shop_id = $shop_id;
    }
    public function get_address(): ?string
    {
        return $this->address;
    }
    public function set_address(string $address): void
    {
        $this->address = $address;
    }

}