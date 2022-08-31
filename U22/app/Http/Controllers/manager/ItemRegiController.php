<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Library\Helper\GetLostItemType;

class ItemRegiController extends Controller
{
    public function show()
    {
        return \view('manager/item_regi', [
            'category' => GetLostItemType::get_id_to_categorys()
        ]);
    }

}
