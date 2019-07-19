@extends('layouts.app')

@section('content')
    {{--<!-- logo -->--}}
    <div align="center">
      <img src="{{ asset('img/logo.png') }}">
    </div>

    <hr style="width: 50%; border:0;border-top:2px  solid grey;">
    <br>


    <div align="center">
        <a href=""><img src="{{ asset ('img/login_google.png') }}" alt=""></a>
        <br>
        <a href="/login/login_facebook"><img src="{{ asset ('img/login_facebook.png') }}" alt=""></a>
    </div>

@endsection
