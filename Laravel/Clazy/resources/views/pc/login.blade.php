<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  {{--<!--     Ajax CSRF      -->--}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Clazy</title>

  {{--<!--     Fonts and icons     -->--}}
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('img/rogo.png') }}">
  <link rel="icon" type="image/png" href="{{ asset ('img/rogo.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  {{--<!-- CSS Files -->--}}
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet">
  <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
  <!-- <link href="{{ asset('css/calcu.css') }}" rel="stylesheet"> -->
</head>

<body>
    {{--<!--  ナビゲーション  -->--}}
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Clazy') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                                {{--<!--12追加：プロフ画像-->--}}
                                <li class="nav-item">
                                  <img height="40px" src="{{-- asset(Auth::user()->picture_path) --}}" >
                                </li>

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{-- Auth::user()->name --}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{-- route('logout') --}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{-- route('logout') --}}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    {{--<!-- logo -->--}}
    <div align="center">
      <img src="{{ asset('img/logo.png') }}">
    </div>

    <hr style="width: 50%; border:0;border-top:2px  solid grey;">
    <br>


    <!-- <div align="center">
        <a href=""><img src="{{ asset ('img/login_google.png') }}" alt=""></a>
        <br>
        <a href="/login/login_facebook"><img src="{{ asset ('img/login_facebook.png') }}" alt=""></a>
    </div> -->

</body>
</html>
