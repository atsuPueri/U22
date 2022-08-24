<?php

namespace App\Library\User\SearchShop;

class SearchShop
{
    private SearchShopPort $port;


    public function __construct(SearchShopPort $port)
    {
        $this->port = $port;
    }

    public function execute(array $serch_info): void
    {
        $this->port->execute($serch_info);
    }

}
