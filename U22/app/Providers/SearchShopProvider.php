<?php

namespace App\Providers;

use App\Library\User\SearchShop\SearchShop;
use App\Library\User\SearchShop\SearchShopAdapter;

class SearchShopProvider
{
    public function register()
    {
        $this->app->bind(GetLostItem::class, function () {
            return new SearchShop(new SearchShopAdapter());
        });
    }
}
