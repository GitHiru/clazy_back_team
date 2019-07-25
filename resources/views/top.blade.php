@extends('layouts.app')

@section('title')
TOP(PC)
@endsection

@section('content')

{{--<!-- logo -->--}}
<div class="text-center">
    <img src="{{ asset('img/logo.png') }}" alt="logo of Clazy" class="img-fluid">
</div>
<hr style="width: 50%; border:0;border-top:2px  solid grey;"><br>

<div class="row justify-content-center">
        <div class="col-8">
            <a href="{{ route('login') }}">
                <button type="button" class="btn btn-secondary active btn-lg btn-block" >
                    <i class="fa fa-desktop"></i>
                    ログイン
                </button>
            </a>
        </div>
</div>

<div class="row justify-content-center mt-4">
        <div class="col-8">
            <a href="{{ route('register') }}">
                <button type="button" class="btn btn-dark btn-lg btn-block" checked>
                    <i class="fas fa-sign-in-alt faa-ring animated"></i>
                    新規登録
                </button>
            </a>
        </div>
</div>


@endsection
