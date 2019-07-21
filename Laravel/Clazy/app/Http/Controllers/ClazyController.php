<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //(追加)chart作成
use Illuminate\Support\Facades\Auth;//(追加)auth作成
use Carbon\Carbon;                //(追加)chart作成
// use App\Clazy;                 //(追加) DB接続の為
use App\Payment;                  //(追加) DB接続の為
use App\User;                     //(追加) DB接続の為
use App\Agent;                     //sp・pc出し分けの為


class ClazyController extends Controller
{
    // ログイン機能 **************************************************************

// FB GM API
//  /**
//      * Redirect the user to the GitHub authentication page.
//      *
//      * @return Response
//      */
//     public function redirectToProvider($provider)
//     {
//         // ユーザーをSNS認証エンドポイントへリダイレクト
//         return \Socialite::driver($provider)->redirect();
//     }

//     /**
//      * Obtain the user information
//      *
//      * @return Response
//      */
//     public function handleProviderCallback(\App\SocialAccountsService $accountService, $provider)
//     {

//         try {
//             $user = \Socialite::with($provider)->user();
//         } catch (\Exception $e) {
//             return redirect('/login');
//         }

//         $authUser = $accountService->findOrCreate(
//             $user,
//             $provider
//         );

//         auth()->login($authUser, true);

//         return redirect()->to('/home');
//     }
// }



    // 入力機能  *****************************************************************


    // pcとspでの出し分け処理
    public function change()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
            // mobile device
            return view('sp.top');
        } else {
            // pc
            return view('pc.dashboard');
        }
    }


    // ダッシュボードを表示する関数
    public function firstInformation()
    {
        $year = date('Y');
        $month = date('n');

        // ログインしているユーザーのユーザーデータの所得
        $user = Auth::user();

        $salary=$user->salary;
        $saving=$user->saving;


        // 今年と今月の値を自動で入力する流れを作成するYEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW());
        $payments = Payment::whereYear('created_at', '=', $year)
        ->whereMonth('created_at', '=', $month)
        // 現在ログインしているユーザーのidと一致する消費をデータをデータベースから所得する
        ->where('user_id', Auth::user()->id)
            // カラムの追加、リレーションを後で追加する必要があるかも
        ->get();

        // 消費金額の合計
        $total = 0;
        foreach ($payments as $item) {
            $total = $total + $item->payment;
        }

        // 自由に使えるお金
        $free = $salary - $saving - $total;


        return view('pc.dashboard', ['salary' => $salary, 'saving' => $saving, 'total' => $total, 'free' => $free]);
    }


    // 電卓画面の表示をする関数
    public function create()
    {
        return view('sp.calcu');
    }


    // 電卓で入力された値をデータベースに保存する関数
    public function store(Request $request)
    {
        $payments = new Payment();
        $user = Auth::user();
        $dt = Carbon::now();

        $payments->payment = $request->payment;
        $payments->user_id = $user->id;

        $payments->created_at_year = $dt->year;
        $payments->created_at_month = $dt->month;
        $payments->created_at_day = $dt->day;


        $payments->save(); //DBに保存

        return redirect()->route('Clazy.create'); //一覧ページにリダイレクト
    }


    // 給料・目標貯金額のデータベースを更新する関数
    public function update(Request $request)
    {
        // ログインユーザー情報を取得します。
        $user = Auth::user();

        $user->saving = $request->saving; //画面で入力されたタイトルを代入
        $user->salary = $request->salary; //画面で入力された本文を代入
        $user->save(); //DBに保存

        return redirect()->route('Clazy.firstInformation'); //一覧ページにリダイレクト
    }


    // 出力機能  *****************************************************************

    public function chart()
    {
        $userId = Auth::user()->id;
        $payments = Payment::where('userId', $userId)->with('payments')->first();

        $dt = Carbon::now();
        $year = $dt->year;
        $month = $dt->month; // date('n')でも取得可
        $startDate = $dt->day - $dt->dayOfWeek; //e.g. 18 - 4 = 14
        $endDate = $dt->day + (6 - $dt->dayOfWeek); //e.g. 18 + (6 - 4 ) = 20


        $mDataTmp = Payment::select(DB::raw('sum(payment) as payment, created_at_month'))
            ->where('user_id', $userId)
            ->groupBy('created_at_month')
            ->orderBy('created_at_month')
            ->pluck('payment', 'created_at_month') //created_at_monthをkeyにデータ取得
            ->toArray();//配列整形

        $wDataTmp = Payment::select(DB::raw('sum(payment) as payment, created_at_day'))
            ->where('user_id', $userId)
            ->where('created_at_year', $year)
            ->where('created_at_month', $month)
            ->whereBetween('created_at_day', [$startDate, $endDate]) //e.g.[1, 100]配列渡し
            ->groupBy('created_at_day')
            ->orderBy('created_at_day')
            ->pluck('payment', 'created_at_day')
            ->toArray();


        $mData = [];
        $months = range(1, 12);
        foreach ($months as $month) {
            $mData[$month] = $mDataTmp[$month] ?? 0; //false（データが無い）なら０を返す
        }

        $wData = [];
        $dates = range($startDate, $endDate);
        foreach ($dates as $date) {
            $wData[$date] = $wDataTmp[$date] ?? 0;
        }

        return ['mData' => $mData, 'wData' => $wData];

    }
        // $agent = new Agent();
        // if ($agent->isMobile()) {
        //     // mobile device
        //     dd("SP");

            //     return view('sp.top');
        // } else {
        //     // pc
        //     dd("PC");
        //     // 現在表示内容にバグが発生している。userバグの発生理由は恐らくaタブでユーザーデータを送っていないから。
        //     // ログインボタンが押された時にこの処理が行われ、どちらの画面に遷移するかを選択してほしい。つまりこの関数はログインボタンを押された時に実行して欲しい。その為にはgetかpostのどちらの処理をするのかを考える必要がある。架空のurlにログインボタンから一度飛ばしてそのurlの時の実行される処理としてこのコントローラーの内容を書けば良い可能性はある。
        //     $year = date('Y');
        //     $month = date('n');

        //     $users = User::all();
        //     // 今年と今月の値を自動で入力する流れを作成するYEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW());
        //     // whereYearの前にユーザーidでデータを大きく囲む。
        //     $payments = Payment::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get();

        //     $total = 0;
        //     foreach ($payments as $item) {
        //         $total = $total + $item->payment;
        //     }

        //     $free = 0;
        //     foreach ($users as $user) {
        //         $free = $user->salary - $user->saving - $total;
        //     }

        //     return view('pc.dashboard', ['users' => $users, 'total' => $total, 'free' => $free]);
        // }

}
