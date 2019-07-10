<?php

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

// Route::get('/', function () { return view('welcome'); }); //(Laravel)初期データ

Route::get('/', function () { return view('pc.login'); }); //log inページを出力

//Route::get('/', 'ClazyController@chartData')->name('top.index');//chartデータ更新
