<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="{{ asset ('img/c.png') }}">

    <!-- css -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/calcu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- js -->
    <script src="{{ asset('js/core/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/calcu.js') }}" defer></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" defer></script>


    <title>Clazy -レジ-</title>
</head>

<body>
    <nav class="navbar navbar-fixed-top" role="navigation" style="background-color: white;">
          <div class="container" style="padding-right: 0px;">
            <span></span><span style="font-size: 25px"><span style="color: #bf9033;">C</span>lazy</span><a href="{{ route('Clazy.top') }}" >
            <i class="fas fa-times fa-2x" style="color: black;"></i></a>
          </div>
    </nav>
    <div class="calc" style="background-color: white;">
        <!-- <a href="{{ route('Clazy.top') }}" class="btn btn-warning btn-block">ホーム画面へ</a> -->
      <form onsubmit="addValue()" action="{{ route('Clazy.create') }}" method="POST" style="background-color: white; height:100vh">
                    @csrf
                    <div class="form-group" style="background-color: black; height: 80px; margin-bottom: 0px;">
                        <input id="payment" name="payment" type="hidden" />
                        <!-- 電卓の表示部分 -->
                        <div class="value-text" id="valueInput">
                            <p id="value-display" class="mb-0"></p>
                                <!-- 追加された部分 -->
                                <!-- <a href="" id="payment" name="payment"> -->
                                <!-- <input type="text" class="form-control" name="title" id="title" /> -->
                        </div>
                        <!-- 電卓の表示部分終了 -->
                    </div>

        <table class="table-buttom">
            <tbody>
                <tr>
                    <td scope="col">
                        <input class="cbtn-head" type="button" value="AC" onclick="calcuInit()">
                    </td>
                    <td scope="col">

                        <input class="cbtn-head" type="button" value="+/-" onclick="calcuNegated()">

                    </td>
                    <td scope="col">
                        <input class="cbtn-head" type="button" value="%" onclick="calcuPercent()">
                    </td>
                    <td scope="col">
                        <input class="cbtn-col" type="button" value="÷" onclick="calcuRun('÷')">

                    </td>
                </tr>

                <tr>
                    <td scope="row">
                        <input class="cbtn-num" type="button" value="7" onclick="calcuInput(7)">
                    </td>
                    <td>
                        <input class="cbtn-num" type="button" value="8" onclick="calcuInput(8)">
                    </td>
                    <td>
                        <input class="cbtn-num" type="button" value="9" onclick="calcuInput(9)">
                    </td>
                    <td>
                        <input class="cbtn-col" type="button" value="×" onclick="calcuRun('×')">
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input class="cbtn-num" type="button" value="4" onclick="calcuInput(4)">

                    </td>
                    <td>
                        <input class="cbtn-num" type="button" value="5" onclick="calcuInput(5)">
                    </td>
                    <td>
                        <input class="cbtn-num" type="button" value="6" onclick="calcuInput(6)">

                    </td>
                    <td>
                        <input class="cbtn-col" type="button" value="-" onclick="calcuRun('-')">

                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input class="cbtn-num" type="button" value="1" onclick="calcuInput(1)">

                    </td>
                    <td>
                        <input class="cbtn-num" type="button" value="2" onclick="calcuInput(2)">

                    </td>
                    <td>
                        <input class="cbtn-num" type="button" value="3" onclick="calcuInput(3)">

                    </td>
                    <td>
                        <input class="cbtn-col" type="button" value="+" onclick="calcuRun('+')">

                    </td>
                </tr>
                <tr>
                    <td colspan="2" scope="row">
                        <input class="cbtn-num cbtn-zero" type="button" value="0" onclick="calcuInput(0)">

                    </td>

                    <td>
                        <input class="cbtn-num" type="button" value="." onclick="calcuInput('.')">

                    </td>
                    <td>
                        <input class="cbtn-col" type="button" value="=" onclick="calcuEqual()">

                    </td>
                </tr>
            </tbody>
        </table>

        {{--<!-- 消費データの送信ボタンを追加 -->--}}
        <div class="text-center">
            <button type="submit" class="btn btn-block" style="background-color: #bf9033; height: 45px;">使ったお金を送信</button>
        </div>

      </form>
    </div>

    <script>
        function addValue() {
            let value = document.getElementById("value-display").innerText;
            document.getElementById("payment").value = value;
        }
    </script>

</body>

</html>

