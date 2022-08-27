<?php
namespace App\Library\User;
use App\Library\User\User;

class UserShop extends User
{
    private int $group_id;
    private string $shop_name;
    private string $address;

    /**
     * @param array{
     *      group_id: int,
     *      shop_name: string,
     *      address: string
     * }
     */
    public function __construct(array $user_info)
    {
        parent::__construct($user_info);
        $this->group_id = $user_info["group_id"];
        $this->shop_name = $user_info["shop_name"];
        $this->address = $user_info["address"];
    }


    // 以下アクセサメソッド。
    public function get_group_id(): ?int
    {
        return $this->group_id;
    }
    public function set_group_id(int $group_id): void
    {
        $this->group_id = $group_id;
    }

    public function get_shop_name(): ?string
    {
        return $this->shop_name;
    }
    public function set_shop_name(string $shop_name): void
    {
        $this->shop_name = $shop_name;
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