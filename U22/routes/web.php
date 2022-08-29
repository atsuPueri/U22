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
        'managerImgName' => 'kizoku.png',//店のプロフィール画像名
        'shopName' => '鳥貴族',//店名
        'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
        'commentNum' => '1',//コメント数
        'menu' => [
            'chat' => ['img' => 'chatCheck.png', 'name' => 'check'],
            'search' => ['img' => 'search.png', 'name' => 'notCheck'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]//メニューバー関連の配列選択されてるページだと画像名にCheckが入る
    ]);
});


Route::get('/manager/managerChatList', function () {
    return view('manager/managerChatList' , [
        'userImgName' => 'uchuneko.png',//ユーザーのプロフィール画像名
        'userName' => '宇宙猫',//ユーザー名
        'comment' => 'ご来店いただきありがとうございます。落とされたハンカチがどのようなものか特徴を教えていただけますか？',//最新のコメント表示
        'commentNum' => '1',//コメント数
        'menu' => [
            'chat' => ['img' => 'chatCheck.png', 'name' => 'check'],
            'lostList' => ['img' => 'lost.png', 'name' => 'notCheck'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]//メニューバー関連の配列選択されてるページだと画像名にCheckが入る
    ]);
});

Route::get('/user/userChat', function () {
    return view('user/userChat' , [
        'link' =>  '../resources/views/userChatList.blade.php',//戻るボタンのリンク、いらないかもしれやんけど一応
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
        'link' =>  '../resources/views/managerChatList.blade.php',//戻るボタンのリンク、いらないかもしれやんけど一応
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

//落とし物登録確認画面
Route::get('/manager/item_confirm', function () {
    return view('manager/item_confirm', [
        'data' => [
            "images" => [ //登録される画像　最大４枚
                "image1" => "img1.jpg",
                "image2" => "img2.jpg",
                "image3" => "img3.jpg",
                "image4" => "img4.jpg"
            ],
            "category" => "傘",
            "date" => "2022年12月12日",
            "time" => "24時59分",
            "detail" => "大きくて黒色。絵の部分が木でできている。"
        ]
    ]);
});

//検索画面：過去に訪れた店舗
Route::get('/user/search', function(){
    return view('/user/search', [
        'data' => [
            ["name" => "鳥貴族", "subName" => "梅田店", "img" => "kizoku.png"],
            ["name" => "鳥貴族", "subName" => "中崎町店", "img" => "kizoku.png"],
            ["name" => "鳥貴族", "subName" => "阪急東通り２号店", "img" => "kizoku.png"],
            ["name" => "鳥貴族", "subName" => "曽根崎センタービル店", "img" => "kizoku.png"]
        ]
    ]);
});

Route::get('/user/search', function(){
    return view('user/search');
});

//検索結果画面
Route::get('/user/search_result', function(){
    return view('user/search_result',[
        'data' => [
            ["name" => "鳥貴族梅田店", "img" => "kizoku.png","address" => "大阪府大阪市北区芝田1-8-1", "address2" => "北野阪急ビル(D.D.HOUSE)2階"],
            ["name" => "鳥貴族中崎町店", "img" => "kizoku.png","address" => "大阪府大阪市北区堂山町15-15", "address2" => "4階"],
            ["name" => "鳥貴族阪急東通り２号店", "img" => "kizoku.png","address" => "大阪府大阪市北区堂山町5-9", "address2" => "扇会館3階"],
            ["name" => "鳥貴族阪急東通り３号店", "img" => "kizoku.png","address" => "大阪府大阪市北区小松原町1-10", "address2" => "梅田パルビル4階"],
            ["name" => "鳥貴族曽根崎センタービル店", "img" => "kizoku.png","address" => "大阪府大阪市北区曽根崎2-10-15", "address2" => "曽根崎センタービル B1"],
            ["name" => "鳥貴族太融寺店", "img" => "kizoku.png","address" => "大阪府大阪市北区太融寺町5-8", "address2" => "B1"],
            ["name" => "鳥貴族福島店", "img" => "kizoku.png","address" => "大阪府大阪市福島区小松原町1-10", "address2" => ""],
        ],
        'menu' => [
            'chat' => ['img' => 'chat.png', 'name' => 'notCheck'],
            'search' => ['img' => 'searchCheck.png', 'name' => 'check'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]//メニューバー関連の配列選択されてるページだと画像名にCheckが入る
    ]);
});
