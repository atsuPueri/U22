<?php
namespace App\Library\User\usecase\UserUpdate;

use PDO;
use App\Library\User\UserGeneral;
use App\Library\User\UserShop;

//アダプタでやる
class UserInterface
{
    /**
     * @var PDO DB接続オブジェクト
     */
    private $db;

    /**
     * コンストラクタ
     * 
     * @param PDO $db DB接続オブジェクト
     */
    public function __construct(PDO $db){
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $this->db = $db;
    }

    /**
     * ユーザー情報更新。
     * 
     * @param Dept $dept 更新情報が格納されたDeptオブジェクト。主キーがこのオブジェクトのidの値のレコードを更新する。
     * @return boolean 登録が成功したかどうかを表す値。
     */
    public function update($user): bool{
        if($user instanceof UserGeneral){
            $sqlUpdate = "UPDATE general SET name = :name,login_way = :login_way,display_name = :display_name WHERE id = :id";
            $stmt = $this->db->prepare($sqlUpdate);
            $stmt->bindValue(":name",$user->get_name(),PDO::PARAM_STR);
            $stmt->bindValue(":login_way",$user->get_login_way(),PDO::PARAM_INT);
            $stmt->bindValue(":display_name",$user->get_display_name(),PDO::PARAM_STR);
            $stmt->bindValue(":id",$user->get_id(),PDO::PARAM_INT);
            $result = $stmt->execute();
            return $result;
        }elseif($user instanceof UserShop){
            $sqlUpdate = "UPDATE general SET name = :name,login_way = :login_way,display_name = :display_name,address = :address WHERE id = :id";
            $stmt = $this->db->prepare($sqlUpdate);
            $stmt->bindValue(":name",$user->get_name(),PDO::PARAM_STR);
            $stmt->bindValue(":login_way",$user->get_login_way(),PDO::PARAM_INT);
            $stmt->bindValue(":display_name",$user->get_display_name(),PDO::PARAM_STR);
            $stmt->bindValue(":address",$user->get_address(),PDO::PARAM_STR);
            $stmt->bindValue(":id",$user->get_id(),PDO::PARAM_INT);
            $result = $stmt->execute();
            return $result;
        }else{
            return null;
        }

    }

}