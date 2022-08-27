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
            $db->where('id', '=', $id, 'or');
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

    public function get_search_lost_item(array $search_info): array
    {
        $db = DB::table('lost_item');

        $func = function ($column) use (&$db, &$search_info) {
            if (array_key_exists($column, $search_info)) {
                if (is_array($search_info[$column])) {
                    foreach ($search_info[$column] as $value) {
                        $db->where($column, '=', $value, 'or');
                    }
                } elseif (is_int($search_info[$column])) {
                    $db->where($column, '=', $search_info[$column], 'or');
                }
            }
        };
        $func('id');
        $func('shop_id');
        $func('genre_id');

        $func = function ($column) use (&$db, &$search_info) {
            if (array_key_exists($column, $search_info)) {
                if (array_key_exists('min', $search_info[$column])) {
                    $db->where($column, '>', $search_info[$column]['min']);
                }
                if (array_key_exists('max', $search_info[$column])) {
                    $db->where($column, '<', $search_info[$column]['max']);
                }
            }
        };
        $func('acquisition_date');
        $func('pickup_date');

        if (array_key_exists('pickup_user_id', $search_info)) {
            $db->where('pickup_user_id', '=', $search_info['pickup_user_id'], 'and');
        }
        if (array_key_exists('police_station_address', $search_info)) {
            $db->where('police_station_address', $search_info['police_station_address'], 'and');
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
