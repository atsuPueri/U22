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
