<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/rogo.png">
  <!-- ファビコンをナマケモノに変換する。バグってるから写真を変える -->
  <link rel="icon" type="image/png" href="../assets/img/rogo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Clazy</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet">
  <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
  <link href="{{ asset('css/calcu.css') }}" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <!-- サイドバーがヘッドバーになる設定の実現 -->
    <!-- 画面サイズが992pxの時にサイドバーは表示されなくなるので、それ以下の時にサイドバーの要素をヘッダーとして表示するという条件を追加する。 -->
    <!-- サイドバー開始 -->
    <header class="sidebar" data-color="yellow">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
       -->
      <div class="logo" style="border-bottom: solid 1px white">
        <span class="simple-text logo-normal">
          <img src="../assets/img/rogo.png" width=100% >
        </span>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li style="border-bottom: solid 1px white">
              <h5><i class="now-ui-icons users_single-02"></i></h5>
              <h5 style="color: white">貯めたいお金</h5>
              <h1 style="color: white"><i class="fas fa-yen-sign"></i>30000</h1>
          </li>
          <li >
            <a data-toggle="modal" data-target="#modal-1" id="modal-open">
              <i class="fas fa-user-edit"></i>
              <p>データ編集</p>
            </a>
          </li>
          <li >
            <a href="./dashboard.html">
              <i class="fas fa-home"></i>
              <p>ホーム画面</p>
            </a>
          </li>
          <li>
            <a href="">
              <i class="fas fa-bell"></i>
              <p>通知</p>
            </a>
          </li>
        </ul>
      </div>
    </header>
    <!-- サイドバー終了 -->

    <!-- start toggle -->
    <style>
    .navbar-wrappe{position: relative;}
    .navbar-toggle{position: absolute; z-index: 999; margin-top:10px;}
    </style>
    <nav>
      <div class="navbar-wrappe">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
          <a class="navbar-brand" href="#pablo"></a>
        </div>
      </div>
    </nav>
    <!-- end toggle -->

<!-- 編集モーダルの完了ボタンを押しても画面を閉じる事ができない。
ボタンにはしっかりとmodal-closeが設定されているしaタブに新しくモーダルopenを設定することもした。jsが起動し始める為にはmodalopenが必要だと思ったがそれでもダメだっった。先生が新しくいれて下さっているデータトグルを追加した意味などを理解出来ると分かるのかなと思った。 -->

    <!-- ここから初期・編集モーダルウィンドウ -->
    <div class="modal fade" id="modal-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <!-- モーダルウィンドウのコンテンツ開始 -->
          <h4>最初に以下の値を入力してね</h4>
          <h3>
            <i class="fas fa-trophy"></i>
            貯めたいお金(月)<br>
            <input type="text">円
          </h3>
          <!-- 例として薄いグレー色で値を表示する。メールアドレスと同じ様に -->
          <!-- 値を右から並べれる様にしたい -->
          <!-- アプリにした時にテキストボックスの枠線が見えない -->

          <h3>
            <i class="fas fa-coins"></i>
            入ったお金(月)
            <input type="text">円
          </h3>
          <p>
            <button class="modal-close button-link " data-dismiss="modal">
              完了
            </button>
          </p>
          <!-- モーダルウィンドウのコンテンツ終了 -->
        </div>
      </div>
    </div>
    <!-- 初期モーダルウィンドウ終わり -->



    <!-- ここから目標貯金額編集モーダルウィンドウ -->
    <!-- <div class="modal fade" id="modal-2">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content"> -->
          <!-- モーダルウィンドウのコンテンツ開始 -->
          <!-- <h3><i class="fas fa-trophy"></i>目標貯金額(月) <input type="text">円</h3>
          <p><button class="modal-close" class="button-link">編集</button></p> -->
          <!-- モーダルウィンドウのコンテンツ終了 -->
        <!-- </div>
      </div>
    </div> -->
    <!-- 目標貯金額編集モーダルウィンドウ終わり -->



    <!-- ここから給料編集モーダルウィンドウ -->
    <!-- <div class="modal fade" id="modal-3">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content"> -->
          <!-- モーダルウィンドウのコンテンツ開始 -->
          <!-- <h3><i class="fas fa-coins"></i>給料(月)<input type="text">円</h3>
          <h3><i class="far fa-clock text-black"></i>給料日<input type="text">日</h3>
          <p><button class="modal-close" class="button-link">編集</button></p> -->
          <!-- モーダルウィンドウのコンテンツ終了 -->
        <!-- </div>
      </div>
    </div> -->
    <!-- 給料編集モーダルウィンドウ終わり -->

<!-- メインパネル -->
<div class="main-panel" id="main-panel">

      <!-- チャート切り替えボタン-->
      <style>
        .chart-box{position: relative;}
        .chart-row{position:absolute; z-index: 999;right:30px;}
        .b{margin:10px;}
        .b:hover{background-color: rgba(255,255,255,0.5;)!important}
      </style>
      <div class="chart-box">
        <div class="row chart-row">
          <button type="button" id="w" class="b btn btn-outline-light btn-sm col-auto">WEEK</button>
          <button type="button" id="m" class="b btn btn-outline-light btn-sm col-auto">MONTH</button>
        </div>
      </div>

      <!-- チャート描画-->
      <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div>

    <!-- コンテンツ カードの配置-->
    <div class="container-fluid content">
      <div class="row mb-3">
        <div class="col-lg-4">
          <div class="card">
            <h3 class="card-header"><i class="fas fa-coins"></i>入ったお金</h3>
            <div class="card-body text-warning">
              <h5 class="card-title py-3"></h5>
              <p class="card-text py-5"><i class="fas fa-yen-sign text-black"></i>230000</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <h3 class="card-header"><i class="fas fa-hand-holding-usd"></i>使ったお金</h3>
            <div class="card-body text-warning">
              <h5 class="card-title py-3"></h5>
              <p class="card-text py-5"><i class="fas fa-yen-sign text-black"></i>170000</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <h3 class="card-header"><i class="fas fa-user-plus"></i>自由に使えるお金</h3>
            <div class="card-body text-warning">
              <h5 class="card-title py-3"></h5>
              <p class="card-text py-5"><i class="fas fa-yen-sign text-black"></i>30000</p>
            </div>
          </div>
        </div>
      </div>
    </div>
          <!-- コンテンツ・カード終わり -->

        <!-- </div> -->
      <!-- </div> -->


      <!-- フッター -->
      <footer class="footer">
        <div class="container-fluid">会社概要:Clazy</div>
      </footer>


  </div><!--class="main-panel" id="main-panel"-->
  <!-- ラッパー閉じる -->



    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.min.js') }}" defer></script>
    <!-- <script src="../assets/js/modal.js"></script> -->
    <script src="{{ asset('js/calcu.js') }}" defer></script>
    <script src="{{ asset('js/core/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/now-ui-dashboard.min.js?v=1.3.0') }}" defer></script>


  <!-- Chart JS -->
  <script src="{{ asset('js/plugins/chartjs.min.js') }}" defer></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script> -->

  <script src="{{ asset('data/data.js') }}" defer></script>

  <script src="../assets/data/data.js"></script>
  <script>
    $(document).ready(function() {
      // default
      // demo.initDashboardPageChartsWeek();
      initDashboardPageChartsWeek();
      // Week
      document.getElementById('w').onclick = function(){
        chnageWeekChart(myChart);
      };
      // Month
      document.getElementById('m').onclick = function(){
        changeMonthChart(myChart);
      };
    });//jquery
  </script>



</body>
</html>
