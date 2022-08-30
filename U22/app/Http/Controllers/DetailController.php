<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail(Request $request)
    {
        $id = $request->id;

        return \view('manager/managerLostDetail',[
            'data' => [
                "id" => $id,
                "date" => "202207242138",
                "name" => "テストデータ".$id,
                "genre" => "アクセサリー",
                "state" => "有"
            ],// 選択されたID番目の忘れ物
        ]);
    }
}
