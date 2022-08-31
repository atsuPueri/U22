<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Library\Helper\GetLostItemType;
use App\Library\Helper\GetNowLoginUser;
use App\Library\LostItem\usecase\GetLostItem\GetLostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemConfirmController extends Controller
{
    // とんでもなく汚いので治したい。
    public function show(Request $request)
    {
        $btn = $request->input('btn');
        if ($btn == 'on' || $btn == 'back') {
            if ($btn == 'back') {
                return \redirect('manager/item_regi');
            }

            DB::table('lost_item')->insert([
                'shop_id' => (new GetNowLoginUser)->get(GetNowLoginUser::TYPE_SHOP)->id,
                'genre_id' => \session('c'),
                'name' => GetLostItemType::get_id_to_categorys()[\session('c')],
                'acquisition_date' => \session('t'),
                'feature' => \session('f'),
                'price' => \session('p'),
            ]);
            return \redirect('/manager/managerLostList');
        }

        $date = $request->input('date', date('Ymd'));
        $h = $request->input('h');
        $i = $request->input('i');
        $time_stamp = \strtotime("{$date}-{$h}-{$i}");
        $time_stamp = $time_stamp == false ? time() : $time_stamp;
        $price = $request->input('price', null);
        $category = $request->input('category');
        $type = GetLostItemType::get_id_to_categorys()[$category] ?? '';
        $feature = $request->input('feature', '');

        $request->session()->flash('d', $date);
        $request->session()->flash('t', $time_stamp);
        $request->session()->flash('p', $price);
        $request->session()->flash('c', $category);
        $request->session()->flash('f', $feature);

        return view('manager/item_confirm', [
            'data' => [
                "category" => $type,
                "date" => \date('Y年m月d日'),
                "time" => "24時59分",
                "detail" => $feature
            ]
        ]);
    }
}
