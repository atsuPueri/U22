<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\login\MailLoginController;
use App\Http\Controllers\login\TelLoginController;
use App\Http\Controllers\manager\ItemConfirmController;
use App\Http\Controllers\manager\ItemRegiController;
use App\Http\Controllers\manager\ManagerChatListControler;
use App\Http\Controllers\manager\ManagerEditPropertyNotificationController;
use App\Http\Controllers\manager\ManagerLostListController;
use App\Http\Controllers\User\SerchResultController;
use App\Http\Controllers\manager\ManagerProfileController;
use App\Http\Controllers\ManagerChatController;
use App\Http\Controllers\User\UserChatController;
use App\Http\Controllers\User\UserChatListController;
use App\Http\Controllers\User\userCheckController;
use App\Http\Controllers\User\UserInputController;
use App\Http\Controllers\User\UserLostListController;
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
Route::get('/user/userChat', [UserChatController::class, 'show']);
Route::post('/user/userChat', [UserChatController::class, 'send']);

Route::get('/manager/managerChatList', [ManagerChatListControler::class, 'show']);
Route::get('/manager/managerChat', [ManagerChatController::class, 'show']);
Route::post('/manager/managerChat', [ManagerChatController::class, 'send']);


// 庶民落とし物
Route::get('/user/userLostList', [UserLostListController::class, 'show']);

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


Route::get('/manager/item_regi', [ItemRegiController::class, 'show']);

//落とし物登録確認画面
Route::post('/manager/item_confirm', [ItemConfirmController::class, 'show']);

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
Route::get('/user/search_result', [SerchResultController::class, 'show']);

