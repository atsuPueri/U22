<?php
namespace App\Library\LostItem\usecase\GetLostItem;

use App\Library\LostItem\LostItem;
use App\Library\LostItem\usecase\GetLostItem\GetLostItemPort;

class GetLostItem
{
    private GetLostItemPort $port;
    public function __construct(GetLostItemPort $port)
    {
        $this->port = $port;
    }

    public function get_item(int $id): LostItem
    {
        return $this->port->get_lost_item($id);
    }

    public function get_items(array $ids): array
    {
        return $this->port->get_lost_items($ids);
    }

}
