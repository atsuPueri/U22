<?php
namespace App\Library\User;


abstract class User
{
    private int $id;
    private string $name;
    private string $password;
    private int $login_way;
    private bool $usage;

    /**
     * @param array{
     *      id: int,
     *      name: string,
     *      password: string,
     *      login_way: int,
     *      usage: bool
     * }
     */
    public function __construct(array $user_info)
    {
        $this->id = $user_info["id"];
        $this->name = $user_info["name"];
        $this->password = $user_info["password"];
        $this->login_way = $user_info["login_way"];
        $this->usage = $user_info["usage"];
    }

    public function get_id(): ?int
    {
        return $this->id;
    }
    public function set_id(int $id): void
    {
        $this->id = $id;
    }
    public function get_name(): ?string
    {
        return $this->name;
    }
    public function set_name(string $name): void
    {
        $this->name = $name;
    }
    public function set_password(string $password): void
    {
        $this->password = $password;
    }
    public function get_login_way(): ?int
    {
        return $this->login_way;
    }
    public function set_login_way(int $login_way): void
    {
        $this->login_way = $login_way;
    }
    public function set_usage(int $usage): void
    {
        $this->usage = $usage;
    }

}
