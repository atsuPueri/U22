<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\login\MailLoginController;
use App\Http\Controllers\login\TelLoginController;
use App\Http\Controllers\manager\ManagerChatListControler;
use App\Http\Controllers\manager\ManagerEditPropertyNotificationController;
use App\Http\Controllers\manager\ManagerLostListController;
use App\Http\Controllers\manager\ManagerProfileController;
use App\Http\Controllers\User\UserChatController;
use App\Http\Controllers\User\UserChatListController;
use App\Http\Controllers\User\userCheckController;
use App\Http\Controllers\User\UserInputController;
use App\Http\Controllers\User\userProfileController;
use App\Http\Controllers\User\UserProfileEditController;
use App\Http\Controllers\User\UserRegistController;
use App\Library\Helper\GetNowLoginUser;

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
    $a = new GetNowLoginUser();
    dd($a->get(GetNowLoginUser::TYPE_GENERAL));
    return view('welcome');
});

Route::get('/user/userChatList', [UserChatListController::class, 'show']);
Route::get('/manager/managerChatList', [ManagerChatListControler::class, 'show']);

Route::get('/user/userChat', [UserChatController::class, 'show']);


Route::get('/manager/managerChat', function () {

});

// 庶民落とし物
Route::get('/user/userLostList', function () {
    // $user = new User();
    return view('user/userLostList', [
        'genre' => [
            "アクセサリ",
            "革小物",
            "傘",
            "その他",
        ], // 種類名
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
Route::get('/manager/managerLostList', [ManagerLostListController::class, 'show']);

// 管理落とし物詳細
// 管理落とし物詳細
Route::get('/manager/managerLostDetail', [DetailController::class, 'detail']);


// ログイン画面
// メール
Route::get('/login/mailLogin', [MailLoginController::class, 'show']);
Route::post('/login/mailLogin', [MailLoginController::class, 'login']);

// 電話番号
Route::get('/login/telLogin', [TelLoginController::class, 'show']);
Route::post('/login/telLogin', [TelLoginController::class, 'login']);

// 新規登録画面
Route::get('/user/userInput', [UserInputController::class, 'show']);
Route::post('/user/userInput', [UserInputController::class, 'input']);
Route::get('/user/userCheck', [UserCheckController::class, 'show']);
Route::post('/user/userRegist', [UserRegistController::class, 'show']);


Route::get('/user/userProfile', [userProfileController::class, 'show']);

Route::get('/manager/managerProfile', [managerProfileController::class, 'show']);
// Route::get('/manager/managerProfile', function () {
//     return view('manager/managerProfile' , [
//         'managerImg' => 'kizoku.png',//画像名
//         'managerName' => 'uchuneko',//ユーザー名
//         'managerMail' => 'uchuneko@gmail.com',//ユーザー名
//         'managerTell' => '00000000000',//電話番号
//         'managerAddress' => '大阪府大阪市生野区生野西2－5－14',//住所
//         'managerId' => '0',//ユーザーID(いるかわからんけど一応)
//         'managerPass' => '•••••••••'//パスワード(伏字になってる)
//     ]);
// });

// プロフィール編集
Route::get('/user/userProfileEdit', [UserProfileEditController::class, 'show']);
Route::post('/user/userProfileEdit', [UserProfileEditController::class, 'edit']);

Route::get('/manager/managerProfileEdit', function () {
    return view('manager/managerProfileEdit' , [
        'edit' => [//valueが情報,errMsgがエラー文
            'account' => ['value' => '鳥貴族' , 'errMsg' => ''],//アカウント名
            'mail' => ['value' => 'torikizoku@gmail' , 'errMsg' => ''],//メアド
            'tell' => ['value' => '00000000000' , 'errMsg' => ''],//電話番号
            'pass' => ['value' => '12345678' , 'errMsg' => ''],//パスワード
            'icon' => ['value' => '' , 'errMsg' => ''],//アイコン
            'address' => ['value' => '大阪府大阪市生野区生野西2－5－14' , 'errMsg' => ''],//住所
        ]
    ]);
});

Route::get('/manager/managerEditPropertyNotification', [ManagerEditPropertyNotificationController::class, 'show']);
Route::post('/manager/managerEditPropertyNotification', [ManagerEditPropertyNotificationController::class, 'edit']);

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

//検索結果画面
Route::get('/user/search_result', function(){
    return view('user/search_result',[
        'data' => [
            ['managerId' => '1' ,"name" => "鳥貴族梅田店", "img" => "kizoku.png","address" => "大阪府大阪市北区芝田1-8-1", "address2" => "北野阪急ビル(D.D.HOUSE)2階"],
            ['managerId' => '2' ,"name" => "鳥貴族中崎町店", "img" => "kizoku.png","address" => "大阪府大阪市北区堂山町15-15", "address2" => "4階"],
            ['managerId' => '3' ,"name" => "鳥貴族阪急東通り２号店", "img" => "kizoku.png","address" => "大阪府大阪市北区堂山町5-9", "address2" => "扇会館3階"],
            ['managerId' => '4' ,"name" => "鳥貴族阪急東通り３号店", "img" => "kizoku.png","address" => "大阪府大阪市北区小松原町1-10", "address2" => "梅田パルビル4階"],
            ['managerId' => '5' ,"name" => "鳥貴族曽根崎センタービル店", "img" => "kizoku.png","address" => "大阪府大阪市北区曽根崎2-10-15", "address2" => "曽根崎センタービル B1"],
            ['managerId' => '6' ,"name" => "鳥貴族太融寺店", "img" => "kizoku.png","address" => "大阪府大阪市北区太融寺町5-8", "address2" => "B1"],
            ['managerId' => '7' ,"name" => "鳥貴族福島店", "img" => "kizoku.png","address" => "大阪府大阪市福島区小松原町1-10", "address2" => ""],
        ],
        'menu' => [
            'chat' => ['img' => 'chat.png', 'name' => 'notCheck'],
            'search' => ['img' => 'searchCheck.png', 'name' => 'check'],
            'resume' => ['img' => 'resume.png', 'name' => 'notCheck']
        ]//メニューバー関連の配列選択されてるページだと画像名にCheckが入る
    ]);
});
