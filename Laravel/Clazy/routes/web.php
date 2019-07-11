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



Route::get('Clazy/create', 'ClazyController@create')->name('Clazy.create'); // 投稿画面

Route::post('Clazy/create', 'ClazyController@store')->name('Clazy.create'); // 保存処理

// ここに表示するダイアリークリエイトは何を指しているのかが分からない。おそらく普通に勝手に定義していると考えられる。
