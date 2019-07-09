<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/calcu.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="../assets/js/calcu.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>

<body>
    <div class="calc">
        <div class="value-text" id="valueInput">
            <p id="value-display"></p>
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
        <a href="#" class="btn-gradient-radius">使ったお金を送信</a>
    </div>
</body>

</html>