<?php
namespace App\Library\User;
class UserShop{
    private ?int $id = null;
    private ?int $shopId = null;
    private ?string $name = "";
    private ?string $address = "";
    private ?string $password = "";
    private ?int $loginWay = null; //ログイン方法(１は電話番号、２はメアドなどconstで定義)
    private ?string $loginValidityPeriod = ""; //ログイン有効期間(月日)
    private ?string $loginToken = null; //ログイントークン(ランダムな文字列)

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
    
    public function getShopId(): ?int{
        return $this->shopId;
    }
    public function setShopId(int $shopId): void{
        $this->shopId = $shopId;
    }

    public function getName(): ?string{
        return $this->name;
    }
    public function setName(string $name): void{
        $this->name = $name;
    }

    public function getAddress(): ?string{
        return $this->address;
    }
    public function setAddress(string $address): void{
        $this->address = $address;
    }

    public function getPassword(): ?string{
        return $this->password;
    }
    public function setPassword(string $password): void{
        $this->password = $password;
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