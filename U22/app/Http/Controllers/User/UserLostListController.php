<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoom;
use App\Library\Helper\GetLostItemType;
use App\Library\LostItem\usecase\GetLostItem\GetLostItem;
use Illuminate\Http\Request;

class UserLostListController extends Controller
{
    public function show(Request $request)
    {
        /** @var GetLostItem */
        $GetLostItem = \resolve(GetLostItem::class);

        $lost_item_list = $GetLostItem->get_search_lost_items([
            'shop_id' => $request->input('managerId')
        ]);

        $map = \collect($lost_item_list)->map(function ($item) {
            return [
                'id' => $item->id,
                'date' => $item->acquisition_date,
                'name' => $item->name,
                'genre' => GetLostItemType::get_id_to_categorys()[$item->genre_id],
                'state' => $item->pickup_date === null ? '有' : '無',

                'managerId' => $item->shop_id
            ];
        });

        return view('user/userLostList', [
            'genre' => [
                "アクセサリ",
                "革小物",
                "傘",
                "その他",
            ], // 種類名
            'data' => $map->all(),// 忘れ物一覧
        ]);
    }

}
