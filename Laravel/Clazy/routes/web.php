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

// （chart）サーバーでの処理
// 直接SQLを記述して、ログイン時のweekデータ７日分＋経過した月合算データを取得してjson形式にして返す
// Route::post('dashboard/{id}/chart', 'DiaryController@chart');

Route::get('dashboard', 'ClazyController@firstInformation')->name('Clazy.firstInformation'); // 目標貯金と給料表示処理

// ■ (SP)loginページ表示
Route::get('/sp', function () { return view('sp.login'); });
// ■ (SP)トップページ表示
Route::get('sp/top', 'ClazyController@createTop')->name('Clazy.top');
// ■ (SP)電卓ページ表示
Route::get('create', 'ClazyController@create')->name('Clazy.create'); // 投稿画面
Route::post('create', 'ClazyController@store')->name('Clazy.create'); // 保存処理
