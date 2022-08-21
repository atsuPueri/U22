<?php

use App\Library\PDF\PDFLib;
use App\Library\PDF\PDFText;
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
    return PDFLib::write_pdf(resource_path() . '/pdf/style02.pdf', [
        new PDFText(100, 100, 'Test', [
            'color' => [255, 0, 0, -1]
        ]),
        new PDFText(100, 120, 'Test2'),
        new PDFText(100, 140, 'Test3'),
    ], false);
});
