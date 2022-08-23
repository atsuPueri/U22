<?php
namespace App\Library\LostItem\usecase\LostItemRegister;

use App\Library\LostItem\LostItem; //忘れ物のクラス？
use App\Library\LostItem\usecase\LostItemRegister\LostItemRegisterPort;

class LostItemRegister
{
    public function __construct(LostItemRegisterPort $port)
    {
        $this->port = $port;
    }

    public function execute(LostItem $lost_item): bool
    {
        return $this->port->register($lost_item);
    }
}