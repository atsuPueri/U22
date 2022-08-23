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
}
