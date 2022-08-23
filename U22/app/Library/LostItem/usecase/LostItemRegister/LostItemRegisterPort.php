<?php
namespace App\Library\LostItem\usecase\LostItemRegister;

use App\Library\LostItem\LostItem; //忘れ物のクラス？

interface LostItemRegisterPort
{
    public function register(LostItem $lost_item): bool;
}