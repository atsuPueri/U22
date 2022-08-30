<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\login\MailLoginController;
use App\Http\Controllers\User\userCheckController;
use App\Http\Controllers\User\UserInputController;
use App\Http\Controllers\User\UserRegistController;

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
        ], // 忘れ物一覧
    ]);
});

// 管理落とし物詳細
// 管理落とし物詳細
Route::get('/manager/managerLostDetail', [DetailController::class, 'detail']);


// ログイン画面
// メール
Route::get('/login/mailLogin', function () {
    return view('login/mailLogin',[
        'errMail' => 'ここにメールアドレスのエラー',
        'errPass' => 'ここにPasswordエラー',
    ]);
});

Route::any('/login/test', [MailLoginController::class, 'show']);

// 電話番号
Route::get('/login/telLogin', function () {
    return view('login/telLogin',[
        'errTel' => 'ここに電話番号のエラー',
        'errPass' => 'ここにPasswordエラー',
    ]);
});

// 新規登録画面
Route::get('/user/userInput', [UserInputController::class, 'show']);
Route::post('/user/userInput', [UserInputController::class, 'input']);

Route::get('/user/userCheck', [UserCheckController::class, 'show']);

Route::post('/user/userRegist', [UserRegistController::class, 'show']);

Route::get('/user/userProfile', function () {
    return view('user/userProfile' , [
        'userImg' => 'uchuneko.png',//画像名
        'userName' => 'uchuneko',//ユーザー名
        'userMail' => 'uchuneko@gmail.com',//ユーザー名
        'userTell' => '00000000000',//電話番号
        'userId' => '0',//ユーザーID(いるかわからんけど一応)
        'userPass' => '•••••••••'//パスワード(伏字になってる)
    ]);
});


Route::get('/manager/managerProfile', function () {
    return view('manager/managerProfile' , [
        'managerImg' => 'kizoku.png',//画像名
        'managerName' => 'uchuneko',//ユーザー名
        'managerMail' => 'uchuneko@gmail.com',//ユーザー名
        'managerTell' => '00000000000',//電話番号
        'managerAddress' => '大阪府大阪市生野区生野西2－5－14',//住所
        'managerId' => '0',//ユーザーID(いるかわからんけど一応)
        'managerPass' => '•••••••••'//パスワード(伏字になってる)
    ]);
});

Route::get('/user/userProfileEdit', function () {
    return view('user/userProfileEdit' , [
        'edit' => [//valueが情報,errMsgがエラー文
            'account' => ['value' => '宇宙猫' , 'errMsg' => ''],//アカウント名
            'mail' => ['value' => 'uchuneko@gmail' , 'errMsg' => ''],//メアド
            'tell' => ['value' => '00000000000' , 'errMsg' => ''],//電話番号
            'pass' => ['value' => '12345678' , 'errMsg' => ''],//パスワード
            'icon' => ['value' => '' , 'errMsg' => '']//アイコン
        ]
    ]);
});

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

Route::get('/manager/managerEditPropertyNotification', function () {
    return view('manager/managerEditPropertyNotification' , [
        'edit' => [//valueが情報,errMsgがエラー文
            'day' => ['value' => '20220831' , 'errMsg' => ''],//届出日
            'police' => ['value' => '曽根崎' , 'errMsg' => ''],//届け先警察署
            'address' => ['value' => '大阪府大阪市生野区生野西2－5－14' , 'errMsg' => ''],//届け元店舗住所
            'account' => ['value' => '鳥貴族' , 'errMsg' => ''],//届け元店舗
            'tell' => ['value' => '01200000000' , 'errMsg' => ''],//届け元店舗電話番号
        ]
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
