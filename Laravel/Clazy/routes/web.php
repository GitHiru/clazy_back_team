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

/*******************************************************
 *     PC + SP 共通
 *******************************************************/
// ■ TOPページ 表示(ログイン＋新規登録画面遷移元)
Route::get('/', function () { return view('top'); })->name('login.top');

// ■ SNS認証ログイン
// Route::get('login/{provider}',          'Auth\SocialAccountController@redirectToProvider');
// Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');



// ■ ログイン
Route::group(['middleware' => 'auth'], function() {

    // spとpcの出し分け処理
    Route::get('change', 'ClazyController@change')->name('Clazy.change'); // 投稿画面


    /*******************************************************
     *    SP
     *******************************************************/
    // ■ (SP)トップページ 表示
    Route::get('/sp', function () { return view('sp.top'); })->name('Clazy.top');
    // ■ (SP)電卓ページ 表示
    Route::get('create', 'ClazyController@create')->name('Clazy.create'); // 投稿画面
    Route::post('create', 'ClazyController@store')->name('Clazy.create'); // 保存処理



    /*******************************************************
     *     PC
     *******************************************************/
    // ■ dashboardページ 表示
    Route::get('/dashboard', 'ClazyController@firstInformation')->name('Clazy.firstInformation');
    // ■ dashboardページ 金額データ更新(put)
    Route::put('/update', 'ClazyController@update')->name('Clazy.update'); //更新処理
    // ■ dashboardページ チャート描画
    Route::post('/dashboard/chart', 'ClazyController@chart');// （chart）
});

Auth::routes();
