<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{--<!--   SEO meta    -->--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset ('img/c.png') }}">
    <title>Clazy - @yield('title')</title>

    {{--<!--   CSRF Token   -->--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<!--   Scripts   -->--}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" defer></script>

    {{--<!--    Fonts   -->--}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />

    {{--<!--   Styles   -->--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sp_input_style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    {{--<!-- PWA -->--}}
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <script src="{{ asset('js/main.js') }}" ></script>

    {{--<!-- Google tags -->--}}

</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
