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

    /**
     * @return LostItem[]
     */
    public function get_items(array $ids): array
    {
        return $this->port->get_lost_items($ids);
    }

    /**
     * @param array{
     *     ?id: int|array<int>,
     *     ?shop_id: int|array<int>,
     *     ?genre_id: int|array<int>,
     *     ?acquisition_date: array{
     *         ?min: int,
     *         ?max: int,
     *     },
     *     ?pickup_date: array{
     *         ?min: int,
     *         ?max: int,
     *     },
     *     ?pickup_user_id: int,
     *     ?police_station_address: string
     * } $search_info 検索条件一覧
     * @return LostItem[]
     */
    public function get_search_lost_items(array $search_info): array
    {
        return $this->port->get_search_lost_item($search_info);
    }

}
