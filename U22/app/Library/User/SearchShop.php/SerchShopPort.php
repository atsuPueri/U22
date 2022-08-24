<?php

namespace App\Library\User\SearchShop;

use App\Library\User\UserShop;

interface SearchShopPort
{
    public function execute(array $serch_info): UserShop;
}
