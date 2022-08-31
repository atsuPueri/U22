<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Library\Helper\GetLostItemType;
use App\Library\Helper\GetNowLoginUser;
use App\Library\LostItem\usecase\GetLostItem\GetLostItem;
use App\Library\User\UserShop;

class ManagerLostListController extends Controller
{
    public function show()
    {
        /** @var GetNowLoginUser */
        $GetUser = new GetNowLoginUser();
        /** @var UserShop */
        $user = $GetUser->get(GetNowLoginUser::TYPE_SHOP);

        if (null === $user) {
            return redirect('/login/mailLogin');
        }

        /** @var GetLostItem */
        $GetLostItem = \resolve(GetLostItem::class);

        $lost_item_array = $GetLostItem->get_search_lost_items([
            'shop_id' => $user->id
        ]);

        $Collection = \collect($lost_item_array)->map(function ($item) {
            return [
                "id" => $item->id,
                "date" => $item->acquisition_date,
                "name" => $item->name,
                "genre" => GetLostItemType::get_id_to_categorys()[$item->genre_id],
                "state" => $item->pickup_date === null ? '有' : '無',
            ];
        });

        return view('manager/managerLostList', [
            'data' => $Collection->all(), // 忘れ物一覧
        ]);
    }

}
