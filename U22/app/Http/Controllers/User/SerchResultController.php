<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerchResultController extends Controller
{
    public function show(Request $request)
    {
        $shop_name = $request->input('shop_name', '');
        $result = DB::table('user_shop')
            ->where('shop_name', 'LIKE', "%{$shop_name}%")
            ->get();

        $map = $result->map(function ($item) {
            return [
                'managerId' => $item->id,
                'name' => $item->shop_name,
                'img' => $item->icon_name,
                'address' => $item->address,
                'address2' => '',
            ];
        });

        return view('user/search_result',[
            'data' => $map->all(),
            'menu' => [
                'chat' => ['img' => 'chat.png', 'name' => 'notCheck'],
                'search' => ['img' => 'searchCheck.png', 'name' => 'check'],
                'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
            ]//メニューバー関連の配列選択されてるページだと画像名にCheckが入る
        ]);
    }
}
