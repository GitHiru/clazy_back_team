<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//(追加)chart作成
use Carbon\Carbon;                //(追加)chart作成
// use App\Clazy;                 //(追加) DB接続の為
use App\Payment;                  //(追加) DB接続の為
use App\User;                     //(追加) DB接続の為


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

    // 初期データを表示するコントローラー
    public function firstInformation()
    {
        $users = User::all();
        $payments = Payment::whereYear('created_at', '=', 2019)->whereMonth('created_at', '=', 7)->get();

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
        $payments = new Payment();

        $dt = Carbon::now();

        // 現在している指定がクレイジーを指定してしまっているから、クレイジーではなくペイメントというモデルを作成しなければならない。

        // クレイジーのデータベース内にあるペイメントファイルに入力した消費データを入力したい。

        $payments->payment = $request->payment; //画面で入力された消費データを代入
        $payments->created_at_year = $int->$dt->year;
        $payments->created_at_month = $request->$dt->month;
        $payments->created_at_day = $request->$dt->day;


        $payments->save(); //DBに保存

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
        $user = new User();
        $user->saving = $request->saving; //画面で入力された目標貯金額を代入
        $user->salary = $request->salary; //画面で入力された給与を代入
        $user->save(); //DBに保存

        return redirect()->route('Clazy.firstInformation'); //一覧ページにリダイレクト
    }



    // 出力機能  *****************************************************************

    public function chart()
    {
        //①データを取得
        /********************
         * 年と月の指定（案）
         *******************/
        $year = date('y');
        $month = date('n');

        // $userId = \Auth::user()->id;
        $userId = 1;

        // $payments = Payment::where('userId', $userId)->with('payments')->first();
        $payments = Payment::select(DB::raw('sum(payment) as payment, created_at'))
                           ->whereMonth('created_at', '7')
                           ->groupBy('created_at')
                           ->get();


        //②データを返す
        $data = ['mData' => [], 'wDdata' => [1, 100, 300, 400]];

        return $data;

    }


}
