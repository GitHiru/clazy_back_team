@extends('layouts.app')

@section('title')
Clazy
@endsection

@section('content')
    {{--<!-- logo -->--}}
    <div align="center">
        <img src="{{ asset('img/logo.png') }}" alt="">
    </div>

    <hr style="width: 50%; border:0;border-top:2px  solid grey;">
    <br>


    <div align="center">
        <a href="{{ route('login') }}"><img src="{{ asset ('img/login_google.png') }}" alt=""></a>
        <br>
        <a href="{{ route('register') }}"><img src="{{ asset ('img/login_facebook.png') }}" alt=""></a>
        <!-- <a href="/login/login_faceboo"><img src="{{ asset ('img/login_facebook.png') }}" alt=""></a> -->
    </div>

@endsection
