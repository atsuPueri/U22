<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/userChatList', function () {
    return view('user/userChatList' , [
        "chatList" => [//チャット一覧の配列
            [
                'managerId' => 0,//店のID(多分ページ遷移するときに使うかな？)
                'managerImgName' => 'kizoku.png',//店のプロフィール画像名
                'shopName' => '鳥貴族',//店名
                'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
                'commentNum' => '1',//コメント数
            ],
            [
                'managerId' => 1,//店のID(多分ページ遷移するときに使うかな？)
                'managerImgName' => 'kizoku.png',//店のプロフィール画像名
                'shopName' => '鳥貴族',//店名
                'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
                'commentNum' => '1',//コメント数
            ]
        ],
        'menu' => [
            'chat' => ['img' => 'chatCheck.png', 'name' => 'check'],
            'search' => ['img' => 'search.png', 'name' => 'notCheck'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]//メニューバー関連の配列選択されてるページだと画像名にCheckが入る
    ]);
});



Route::get('/manager/managerChatList', function () {
    return view('manager/managerChatList' , [
        "chatList" => [//チャット一覧の配列
            [
                'userId' => 0,//ユーザーID(多分ページ遷移するときに使うかな？)
                'userImgName' => 'uchuneko.png',//ユーザーのプロフィール画像名
                'userName' => '宇宙猫',//ユーザー名
                'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
                'commentNum' => '1',//コメント数
            ],
            [
                'userId' => 1,//ユーザーID(多分ページ遷移するときに使うかな？)
                'userImgName' => 'uchuneko.png',//ユーザーのプロフィール画像名
                'userName' => '宇宙猫',//ユーザー名
                'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
                'commentNum' => '1',//コメント数
            ]
        ],
        'menu' => [
            'chat' => ['img' => 'chatCheck.png', 'name' => 'check'],
            'lostList' => ['img' => 'lost.png', 'name' => 'notCheck'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]//メニューバー関連の配列選択されてるページだと画像名にCheckが入る

    ]);
});

Route::get('/user/userChat', function () {
    return view('user/userChat' , [
        'managerImgName' => 'kizoku.png',//店のプロフィール画像名
        'managerName' => '鳥貴族',//店名
        'chat' => [
            ['comment' => 'すみません。今日そちらで20時くらいに食事をしたのですがそちらにハンカチを落としていきませんでしたか？' , 'who' => 'userComment'],
            ['comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？' , 'who' => 'managerComment'],
            ['comment' => '水色とグレーのミレミアムファルコン号のハンカチです' , 'who' => 'userComment'],
            ['comment' => 'handkerchief.jpg' , 'who' => 'userImgComment'],
            ['comment' => 'handkerchief.jpg' , 'who' => 'managerImgComment'],
            ['comment' => 'こちらでしょうか？' , 'who' => 'managerComment'],
        ],//コメントは二次元配列で、画像はcommentに画像名を、whoはclassを書くとき用(ユーザー：userComment , 店：managerComment , ユーザー画像：userImgComment , 店画像：managerImgComment)
        'input' => ''//いるかわからんけどインプットの内容
    ]);
});


Route::get('/manager/managerChat', function () {
    return view('manager/managerChat' , [
        'userImgName' => 'uchuneko.png',//ユーザーのプロフィール画像名
        'userName' => '宇宙猫',//ユーザー名
        'chat' => [
            ['comment' => 'すみません。今日そちらで20時くらいに食事をしたのですがそちらにハンカチを落としていきませんでしたか？' , 'who' => 'userComment'],
            ['comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？' , 'who' => 'managerComment'],
            ['comment' => '水色とグレーのミレミアムファルコン号のハンカチです' , 'who' => 'userComment'],
            ['comment' => 'handkerchief.jpg' , 'who' => 'userImgComment'],
            ['comment' => 'handkerchief.jpg' , 'who' => 'managerImgComment'],
            ['comment' => 'こちらでしょうか？' , 'who' => 'managerComment'],
        ],//コメントは二次元配列で、画像はcommentに画像名を、whoはclassを書くとき用(ユーザー：userComment , 店：managerComment , ユーザー画像：userImgComment , 店画像：managerImgComment)
        'input' => ''//いるかわからんけどインプットの内容
    ]);
});

// 庶民落とし物
Route::get('/user/userLostList', function () {
    // $user = new User();
    return view('user/userLostList', [
        'data' => [
            ["id" => "1","date" => "20220724", "name" => "テストデータ1", "genre" => "アクセサリー", "state" => "有"],
            ["id" => "2","date" => "20220726", "name" => "テストデータ2", "genre" => "革小物", "state" => "無"],
            ["id" => "3","date" => "20220726", "name" => "テストデータ3", "genre" => "アクセサリー", "state" => "有"],
            ["id" => "4","date" => "20220727", "name" => "テストデータ4", "genre" => "傘", "state" => "有"],
            ["id" => "5","date" => "20220728", "name" => "テストデータ5", "genre" => "衣類", "state" => "無"],
            ["id" => "6","date" => "20220730", "name" => "テストデータ6", "genre" => "衣類", "state" => "有"],
            ["id" => "7","date" => "20220731", "name" => "テストデータ7", "genre" => "アクセサリー", "state" => "無"],
        ],// 忘れ物一覧
    ]);
});

// 管理落とし物
Route::get('/manager/managerLostList', function () {
    // $user = new User();
    return view('manager/managerLostList', [
        'data' => [
            ["id" => "1","date" => "20220724", "name" => "テストデータ1", "genre" => "アクセサリー", "state" => "有"],
            ["id" => "2","date" => "20220726", "name" => "テストデータ2", "genre" => "革小物", "state" => "無"],
            ["id" => "3","date" => "20220726", "name" => "テストデータ3", "genre" => "アクセサリー", "state" => "有"],
            ["id" => "4","date" => "20220727", "name" => "テストデータ4", "genre" => "傘", "state" => "有"],
            ["id" => "5","date" => "20220728", "name" => "テストデータ5", "genre" => "衣類", "state" => "無"],
            ["id" => "6","date" => "20220730", "name" => "テストデータ6", "genre" => "衣類", "state" => "有"],
            ["id" => "7","date" => "20220731", "name" => "テストデータ7", "genre" => "アクセサリー", "state" => "無"],
        ],// 忘れ物一覧
    ]);
});

// 管理落とし物詳細
Route::get('/manager/managerLostDetail', function () {
    // $user = new User();
    return view('manager/manaLostDetail', [
        'data' => [
            "id" => "1",
            "date" => "202207242138",
            "name" => "テストデータ1",
            "genre" => "アクセサリー",
            "state" => "有"
        ],// 選択されたID番目の忘れ物
    ]);
});
