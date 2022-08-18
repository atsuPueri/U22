<?php

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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

Route::get('/test', function () {
    /** @var Request */
    $request = resolve(Request::class);
    // dump($request);

    Cookie::queue(cookie("A", "A", 2));
    dump($request->cookie());


    // return resolve(Response::class)->http_response_code;
    var_dump(Cookie::get());

    // return view('welcome');
});
