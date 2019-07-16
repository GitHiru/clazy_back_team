<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Clazy;//(追加) DB接続の為
use App\Payment;//(追加) DB接続の為
use App\User;//(追加) DB接続の為

class ClazyController extends Controller
{
    // ログイン機能 **************************************************************
    // dear Mau
    // 一旦授業のログイン機能を実施。その後はtrelloにある他のAPIでログインを試みる!
    public function createTop()
    {
        // views/diaries/create.blade.phpを表示する

        return view('sp.top');
    }






    // 入力機能  *****************************************************************
    // dear Hiroto
    // 恐らく複数のメソッドが予想されるよ！


    // 初期データを表示するコントローラー
    public function firstInformation()
    {
        $year=date('Y');
        $month=date('n');

        $users = User::all();
         // 今年と今月の値を自動で入力する流れを作成するYEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW());
        $payments = Payment::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get();

        $total =0;
        foreach ($payments as $item) {
            $total = $total + $item->payment;
        }

        $free =0;
        foreach ($users as $user ) {
            $free = $user->salary - $user->saving-$total;
        }

        return view('pc.dashboard',['users' => $users, 'total' => $total, 'free' => $free]);
    }

    public function create()
    {
        // views/diaries/create.blade.phpを表示する

        return view('sp.calcu');
    }

    public function store(Request $request)
    {
        // dd($request->input('payment'));
        $payment = new Payment(); //Diaryモデルをインスタンス化
        // 現在している指定がクレイジーを指定してしまっているから、クレイジーではなくペイメントというモデルを作成しなければならない。

        // クレイジーのデータベース内にあるペイメントファイルに入力した消費データを入力したい。

        $payment->payment = $request->payment; //画面で入力された消費データを代入
        $payment->save(); //DBに保存

        return redirect()->route('Clazy.create'); //一覧ページにリダイレクト
    }

    public function edit(int $id)
    {
        $user = User::find($id);

        return view('pc.dashboard', [
            'user' => $user,
        ]);
    }

    public function update(int $id, Request $request)
    {

        $user = User::find($id);

        $user->saving = $request->saving; //画面で入力されたタイトルを代入
        $user->salary = $request->salary; //画面で入力された本文を代入
        $user->save(); //DBに保存

        return redirect()->route('Clazy.firstInformation'); //一覧ページにリダイレクト
    }

    // 初期投稿保存処理

    public function storeFirst(Request $request)
    {
        $user = new User(); //Diaryモデルをインスタンス化

        $user->saving = $request->saving; //画面で入力されたタイトルを代入
        $user->salary = $request->salary; //画面で入力された本文を代入
        $user->save(); //DBに保存

        return redirect()->route('Clazy.firstInformation'); //一覧ページにリダイレクト
    }



    // 出力機能  *****************************************************************
    // User毎にWeek＋Monthデータを取得＋chart.jsに配列渡し。

    public function chart()
    {
        //①DBからデータを取得
        $payments = Payment::all();
        // $payments = Payment::('id', 'payment')->get();
        dd($payments);

        //②データを整形しViewに返す
        return view('pc.dashboard');
    }

}
