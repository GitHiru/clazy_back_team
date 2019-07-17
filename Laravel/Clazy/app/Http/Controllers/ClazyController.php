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
        $payments = new Payment();

        $dt = Carbon::now();

        // 現在している指定がクレイジーを指定してしまっているから、クレイジーではなくペイメントというモデルを作成しなければならない。

        $payments->payment = $request->payment; //画面で入力された消費データを代入
        $payments->created_at_year = $dt->year;
        $payments->created_at_month = $dt->month;
        $payments->created_at_day = $dt->day;


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
        //＃データを取得

        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month;// date('n')でも取得可
        $startDate = $dt->day - $dt->dayOfWeek;//e.g. 18 - 4 = 14
        $endDate = $dt->day + (6 - $dt->dayOfWeek);//e.g. 18 + (6 - 4 ) = 20

        // $userId = \Auth::user()->id;

        // $payments = Payment::where('userId', $userId)->with('payments')->first();
        $mDataTmp = Payment::select(DB::raw('sum(payment) as payment, created_at_month'))
                           // ->where('user_id', $userId)
                           ->groupBy('created_at_month')
                           ->orderBy('created_at_month')
                           ->get()
                           ->toArray();


        $wDataTmp = Payment::select(DB::raw('sum(payment) as payment, created_at_day'))
                          // ->where('user_id', $userId)
                          ->where('created_at_year', $year)
                          ->where('created_at_month', $month)
                          ->whereBetween('created_at_day', [$startDate, $endDate])//e.g.[1, 100]配列渡し
                          ->groupBy('created_at_day')
                          ->orderBy('created_at_day')
                          ->get()
                          ->toArray();

        // ＃データを加工（二次元配列を配列に）
        // for($i = 1; $i <= 12; $i++) {
        //     $mData[] =
        // }

        // $mData =

        // $wData =
        dd($wDataTmp);
        // [
        //     1 => 4,
        //     2 => 9
        // ];


        // ＃データを返す
        $data = ['mData' => $mData, 'wDdata' => $wData];

        return $data;

    }


}
