<?php
namespace App\Library\User\DAO;

use PDO;
use App\Library\User\UserShop;
use App\Library\User\UserGeneral;

class UserDAO{
    /**
     *  PDO DB接続オブジェクト
     */
    private $db;

    /**
     *  PDO $db DB接続オブジェクト
     */
    public function __construct(PDO $db){
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $this->db = $db;
    }

    /**
     *  update(店舗側)
     */
    public function update(UserShop $userShop): bool{
        $sqlUpdate = "UPDATE userShop SET shopId = :shopId,name = :name,address = :address,password = :password,loginWay = :loginWay, WHERE id = :id";
        $stmt = $this->db->prepare($sqlUpdate);
        $stmt->bindValue(":shopId",$userShop->getShopId(),PDO::PARAM_INT);
        $stmt->bindValue(":name",$userShop->getName(),PDO::PARAM_STR);
        $stmt->bindValue(":address",$userShop->getAddress(),PDO::PARAM_STR);
        $stmt->bindValue(":password",$userShop->getPassword(),PDO::PARAM_STR);
        $stmt->bindValue(":loginWay",$userShop->getLoginWay(),PDO::PARAM_INT);
        $stmt->bindValue(":id",$userShop->getId(),PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

}