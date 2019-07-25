<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  {{--<!--     Ajax CSRF      -->--}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Clazy-管理画面-</title>

  {{--<!--     Fonts and icons     -->--}}
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('img/rogo.png') }}">
  <link rel="icon" type="image/png" href="{{ asset ('img/c.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  {{--<!-- CSS Files -->--}}
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet">
  <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
  <link href="{{ asset('css/calcu.css') }}" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <header class="sidebar" data-color="yellow">
      <div class="logo" style="border-bottom: solid 1px white; background-color: #bf9033;">
        <span class="simple-text logo-normal">
          <img src="{{ asset ('img/rogo.png') }}" width=100% >
        </span>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper" style="background-color: #bf9033;">
        <ul class="nav">
          <li style="border-bottom: solid 1px white">
              <h5><i class="fas fa-trophy"></i></h5>
              <h5 style="color: white">saving</h5>
              <h1 style="color: white"><i class="fas fa-yen-sign"></i>{{ $saving }}</h1>
          </li>
          <li >
            <a data-toggle="modal" data-target="#modal-1" id="modal-open">
              <i class="fas fa-user-edit"></i>
              <p>edit</p>
            </a>
          </li>
          <li>
            <a href="{{ route('Clazy.change') }}" >
              <i class="fas fa-mobile-alt"></i>
              <p>like google</p>
            </a>
          </li>
          <li >
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-home"></i>
                    <p>logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li >
        </ul>
      </div>
    </header>
    <!-- サイドバー終了 -->


    {{--<!--   start toggle    -->--}}
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
    {{--<!--   end toggle   -->--}}


<!-- 現在の使用では初期モーダルウィンドウは画面が開かれる度に出て来るようになっている。これを初めてこの画面が表示された時に一度だけ表示するという処理に変更する -->
    <!-- ここから初期モーダルウィンドウ -->
    <div class="modal fade" id="modal-2">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          @if($errors->any())
          <div style="margin: auto;">
             <ul>
                 @foreach($errors->all() as $message)
                      <li class="alert alert-danger">{{ $message }}</li>
                 @endforeach
             </ul>
          </div>
          @endif
          <form action="{{ route('Clazy.update') }}" method="post">
                    @csrf
                    @method('put')
          <!-- モーダルウィンドウのコンテンツ開始 -->
            <h4>Please put your money information</h4>
            <h3>
              <i class="fas fa-trophy"></i>
              saving(month)<br>
              <input type="text" name="saving" id="saving" value="{{ old('saving', $saving) }}" style="text-align: center;">
            </h3>
            <h3>
              <i class="fas fa-coins"></i>
              salary(month)
              <input type="text" name="salary" id="salary" value="{{ old('salary', $salary) }}" style="text-align: center;">
            </h3>
            {{--
            <!-- 例として薄いグレー色で値を表示する。メールアドレスと同じ様に -->
            <!-- 値を右から並べれる様にしたい -->
            <!-- アプリにした時にテキストボックスの枠線が見えない -->
            --}}
            <p>
              <button class="button-link" type="submit">
                finish
              </button>
            </p>
          </form>
          <!-- モーダルウィンドウのコンテンツ終了 -->
        </div>
      </div>
    </div>
    <!-- 初期モーダルウィンドウ終わり -->


    <!-- ここから編集モーダルウィンドウ -->
    <div class="modal fade" id="modal-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <!-- モーダルウィンドウのコンテンツ開始 -->
            @if($errors->any())
          <div style="margin: auto;">
             <ul>
                 @foreach($errors->all() as $message)
                      <li class="alert alert-danger">{{ $message }}</li>
                 @endforeach
             </ul>
          </div>
            @endif
        <form action="{{ route('Clazy.update') }}" method="post">
                    @csrf
                    @method('put')
          <h3>
            <i class="fas fa-trophy"></i>
            貯めたいお金(月)<br>
            <input type="text" name="saving" id="saving" value="{{ old('saving', $saving) }}" style="text-align: center;">円
          </h3>

          <h3>
            <i class="fas fa-coins"></i>
            入ったお金(月)
            <input type="text" name="salary" id="salary" value="{{ old('salary', $salary) }}" style="text-align: center;">円
          </h3>
          <p>
            <button type="submit" class="button-link ">
              完了
            </button>
          </p>
          </form>
          <!-- モーダルウィンドウのコンテンツ終了 -->
        </div>
      </div>
    </div>
    <!-- 初期モーダルウィンドウ終わり -->

    {{--<!--   main panel   -->--}}
    <div class="main-panel" id="main-panel">
        {{--<!--   チャート切り替えボタン  -->--}}
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

        {{--<!--   チャート描画  -->--}}
        <div class="panel-header panel-header-lg">
            <canvas id="bigDashboardChart"></canvas>
        </div>

        {{--<!--   コンテンツ カードの配置  -->--}}
        <div class="container-fluid content">
              <div class="row mb-3">
                <div class="col-lg-4">
                  <div class="card">
                    <h3 class="card-header"><i class="fas fa-coins"></i>salary</h3>
                    <div class="card-body text-warning">
                      <h5 class="card-title py-3"></h5>
                      <p class="card-text py-5" style="color: #bf9033"><i class="fas fa-yen-sign text-black"></i>{{ $salary }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card">
                    <h3 class="card-header"><i class="fas fa-hand-holding-usd"></i>expense</h3>
                    <div class="card-body text-warning">
                      <h5 class="card-title py-3"></h5>
                      <p class="card-text py-5" style="color: #bf9033"><i class="fas fa-yen-sign text-black"></i>{{ $total }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card">
                    <h3 class="card-header"><i class="fas fa-user-plus"></i>freely money</h3>
                    <div class="card-body text-warning">
                      <h5 class="card-title py-3"></h5>
                      <p class="card-text py-5" style="color: #bf9033"><i class="fas fa-yen-sign text-black"></i>{{ $free }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        {{--<!--   コンテンツ・カード終わり   -->--}}

        {{--<!--  footer  -->--}}
        <footer class="footer">
            <div class="container-fluid">会社概要:Clazy</div>
        </footer>
    </div>
    {{--<!-- end mein panel -->--}}

    {{--<!--  JS Files   -->--}}
    <script src="{{ asset('js/core/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/calcu.js') }}" defer></script>
    <script src="{{ asset('js/core/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/now-ui-dashboard.min.js?v=1.3.0') }}" defer></script>
    {{--<!--    Chart JS   -->--}}
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script> -->
    <script src="{{ asset('js/plugins/chartjs.min.js') }}" defer></script>
    <script src="{{ asset('js/chartdata.js') }}" defer></script>

    @if($salary == 0)
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    @endif
</body>
</html>
