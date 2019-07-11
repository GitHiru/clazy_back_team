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

// ■ loginページ表示
Route::get('/', function () { return view('pc.login'); });
// ■ firstモーダルページ表示
Route::get('/modal', function () { return view('pc.modal'); });
// ■ dashboardページ表示
Route::get('/dashboard', function () { return view('pc.dashboard'); });
//Route::get('/', 'ClazyController@chartData')->name('top.index');//chartデータ更新

// ■ (SP)loginページ表示
Route::get('/sp', function () { return view('sp.login'); });
// ■ (SP)トップページ表示
Route::get('sp/top', 'ClazyController@createTop')->name('Clazy.top');
// ■ (SP)電卓ページ表示
Route::get('create', 'ClazyController@create')->name('Clazy.create'); // 投稿画面
Route::post('create', 'ClazyController@store')->name('Clazy.create'); // 保存処理

