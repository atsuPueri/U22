<?php
namespace App\Library\User;
class UserGeneral{
    private ?int $id = null;
    private ?string $name = ""; //本名
    private ?string $password = "";
    private ?string $displayName = ""; //表示名
    private ?int $loginWay = null; //ログイン方法
    // private ?int $usage = null; //アカウント使用されているか
    private ?string $loginValidityPeriod = ""; //ログイン有効期間
    private ?int $loginToken = null; //ログイントークン

    /**
     * @return int ログイン方法？
     */
    public function LoginWay(): int{
        if($this->loginWay = 1){
            //電話番号
        }elseif($this->loginWay = 2){
            //メールアドレス
        }
    }

    /**
     * @return bool アカウント使用されているか？
     */
    public function Usage(): bool{
        // if(){

        // }
    }


    // 以下アクセサメソッド。
    public function getId(): ?int{
        return $this->id;
    }
    public function setId(int $id): void{
        $this->id = $id;
    }
    
    public function getName(): ?string{
        return $this->name;
    }
    public function setName(string $name): void{
        $this->name = $name;
    }

    public function getPassword(): ?string{
        return $this->password;
    }
    public function setPassword(string $password): void{
        $this->password = $password;
    }

    public function getDisplayName(): ?string{
        return $this->displayName;
    }
    public function setDisplayName(string $displayName): void{
        $this->displayName = $displayName;
    }

    public function getLoginWay(): ?int{
        return $this->loginWay;
    }
    public function setLoginWay(int $loginWay): void{
        $this->loginWay = $loginWay;
    }

    public function getUsage(): ?int{
        return $this->usage;
    }
    public function setUsage(int $usage): void{
        $this->usage = $usage;
    }

    public function getLoginValidityPeriod(): ?string{
        return $this->loginValidityPeriod;
    }
    public function setLoginValidityPeriod(string $loginValidityPeriod): void{
        $this->loginValidityPeriod = $loginValidityPeriod;
    }

    public function getLoginToken(): ?int{
        return $this->loginToken;
    }
    public function setLoginToken(int $loginToken): void{
        $this->loginToken = $loginToken;
    }

}