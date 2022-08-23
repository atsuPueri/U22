<?php
namespace App\Library\LostItem\usecase\LostItemRegister;

use App\Library\LostItem\usecase\LostItemRegister\LostItemRegisterPort;
use App\Library\LostItem\LostItem; //忘れ物のクラス？
use Illminate\Support\Facades\DB;

class LostItemRegisterAdapter implements LostItemRegisterPort
{
    /**
     * 忘れ物情報登録。
     */
    public function register(LostItem $lost_item): bool
    {
        $sqlRegister = DB::table('lost_item')
        // ->join('user_shop', 'lost_item.shop_id', '=', 'user_shop.id')
        ->insert(['shop_id' => ':shop_id', 'name' => ':name', 'acquisition_date' => ':acquisition_date']);
        return $sqlRegister !== 0;
    }
}