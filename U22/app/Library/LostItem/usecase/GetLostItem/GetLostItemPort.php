<?php
namespace App\Library\LostItem\usecase\GetLostItem;

use App\Library\LostItem\LostItem;

interface GetLostItemPort
{
    public function get_lost_item(int $id): LostItem;

    /**
     * @param array<int> 取得したいid一覧
     * @return array<LostItem>
     */
    public function get_lost_items(array $ids): array;

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
     */
    public function get_search_lost_item(array $search_info): array;

}
