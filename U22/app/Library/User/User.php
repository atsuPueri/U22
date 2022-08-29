<?php
namespace App\Library\User;


abstract class User
{
    private int $id;
    private string $password;
    private int $phone_number;
    private string $mail_address;
    private string $login_token;
    private string $expiration_date;
    private bool $status;
    private int $is_shop;
    private string $image_name;

    /**
     * @param array{
     *      id: int,
     *      password: string,
     *      phone_number: int,
     *      mail_address: string,
     *      login_token: string,
     *      expiration_date: string,
     *      status: bool,
     *      is_shop: int,
     *      image_name: int
     * }
     */
    public function __construct(array $user_info)
    {
        $this->id = $user_info["id"];
        $this->password = $user_info["password"];
        $this->phone_number = $user_info["phone_number"];
        $this->mail_address = $user_info["mail_address"];
        $this->login_token = $user_info["login_token"];
        $this->expiration_date = $user_info["expiration_date"];
        $this->status = $user_info["status"];
        $this->is_shop = $user_info["is_shop"];
        $this->image_name = $user_info["image_name"];

    }

    public function get_id(): ?int
    {
        return $this->id;
    }
    public function set_id(int $id): void
    {
        $this->id = $id;
    }
    
    public function set_password(string $password): void
    {
        $this->password = $password;
    }

    public function get_phone_number(): ?int
    {
        return $this->phone_number;
    }
    public function set_phone_number(int $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function get_mail_address(): ?string
    {
        return $this->mail_address;
    }
    public function set_mail_address(string $mail_address): void
    {
        $this->mail_address = $mail_address;
    }

    public function get_login_token(): ?string
    {
        return $this->login_token;
    }
    public function set_login_token(string $login_token): void
    {
        $this->login_token = $login_token;
    }

    public function get_expiration_date(): ?string
    {
        return $this->expiration_date;
    }
    public function set_expiration_date(string $expiration_date): void
    {
        $this->expiration_date = $expiration_date;
    }

    public function set_status(int $status): void
    {
        $this->status = $status;
    }

    public function get_is_shop(): ?int
    {
        return $this->is_shop;
    }
    public function set_is_shop(int $is_shop): void
    {
        $this->is_shop = $is_shop;
    }

    public function get_image_name(): ?string
    {
        return $this->image_name;
    }
    public function set_image_name(string $image_name): void
    {
        $this->image_name = $image_name;
    }

}
