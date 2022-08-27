<?php
namespace App\Library\User\interface;

use PDO;
use App\Library\User\User;
use App\Library\User\UserGeneral;
use App\Library\User\UserShop;


class DeptDAO
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
     * 部門情報更新。更新対象は1レコードのみ。
     * 
     * @param Dept $dept 更新情報が格納されたDeptオブジェクト。主キーがこのオブジェクトのidの値のレコードを更新する。
     * @return boolean 登録が成功したかどうかを表す値。
     */
    public function update(Dept $dept): bool{
        $sqlUpdate = "UPDATE depts SET dp_no = :dp_no,dp_name = :dp_name,dp_loc = :dp_loc WHERE id = :id";
        $stmt = $this->db->prepare($sqlUpdate);
        $stmt->bindValue(":dp_no",$dept->getDpNo(),PDO::PARAM_INT);
        $stmt->bindValue(":dp_name",$dept->getDpName(),PDO::PARAM_STR);
        $stmt->bindValue(":dp_loc",$dept->getDpLoc(),PDO::PARAM_STR);
        $stmt->bindValue(":id",$dept->getId(),PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

}