<?php
namespace App\Library\LostItem\usecase\GetLostItem;

use App\Library\LostItem\LostItem;
use App\Library\LostItem\usecase\GetLostItem\GetLostItemPort;
use Illuminate\Support\Facades\DB;

class GetLostItemAdapter implements GetLostItemPort
{
    public function get_lost_item(int $id): LostItem
    {
        $result = DB::table('lost_item')
                    ->where('id', '=', $id)
                    ->first();
        return new LostItem(
            $result->id,
            $result->shop_id,
            $result->genre_id,
            $result->name,
            $result->acquisition_date,
            $result->pickup_date,
            $result->pickup_user_id,
            $result->police_station_address,
        );
    }

    public function get_lost_items(array $ids): array
    {
        $db = DB::table('lost_item');
        foreach ($ids as $id) {
            $db->where('id', '=', $id);
        }
        $result = $db->get();

        $map = $result->map(function ($value, $key) {
            return new LostItem(
                $value->id,
                $value->shop_id,
                $value->genre_id,
                $value->name,
                $value->acquisition_date,
                $value->pickup_date,
                $value->pickup_user_id,
                $value->police_station_address,
            );
        });
        return $map->all();
    }
}
