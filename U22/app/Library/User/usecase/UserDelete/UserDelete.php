<?php
namespace App\Library\User\usecase\UserUpdate;

use PDO;
use App\Library\User\UserGeneral;
use App\Library\User\UserShop;

//アダプタでやる
class UserDelete
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

}