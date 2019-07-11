/**
 * 数値を読み取ります。
 * @param {number} btn 入力された数値です。
 */
var ans = 0;
var tmp = 0;
var key = "";
var keytmp = "";

/**
 * ACの初期化関数
 */
function calcuInit() {
    document.getElementById('value-display').innerHTML = "";
    ans = 0;
    tmp = 0;
    key = "";
}


/**
 * 数値入力関数。
 * 四則演算のボタンが押された直後の入力で表示をクリアする。
 */
function calcuInput(btn) {
    const valueDisplay = document.getElementById('value-display');
    if (btn == '.') {
        if (valueDisplay.innerHTML.match(new RegExp("\\.")) != null) return 0;
    }
    if (keytmp != "") vDisplayClea();
    // (keytmp != "") ? vDisplayClea(): console.log();
    valueDisplay.innerText = valueDisplay.innerText + btn;

}


/**
 * 四則演算の実行
 * @param {string} keyinp 入力された演算子
 */
function calcuRun(keyinp) {
    const valueDisplay = document.getElementById('value-display');
    tmp = valueDisplay.innerHTML;
    if (key != "") {
        ans = calcAny(ans, tmp, key);
        tmp = 0;
        valueDisplay.innerText = ans * 1;
    }
    // keyに前回押した演算子を保存
    key = keyinp;
    keytmp = keyinp;
    ans += tmp * 1;
}


/**
 * 四則演算の結果を返す。
 * 三項演算子を使いたかったが、returnが上手く返せなかった。
 * @param {number} ans 直前の計算結果
 * @param {number} tmp 四則演算する数値
 * @param {string} keyinp 実行する演算子
 */
function calcAny(ans, tmp, keyinp) {
    if (keyinp == '+') { return ans * 1 + tmp * 1 }
    if (keyinp == '-') { return ans * 1 - tmp * 1 }
    if (keyinp == '×') { return ans * 1 * tmp * 1 }
    if (keyinp == '÷') { return ans * 1 / tmp * 1 }
}


/**
 * 結果の表示。
 * 2回目のクリックでは値を初期化する。
 */
function calcuEqual() {
    (key == undefined) ? calcuInit(): calcuRun();
}


/**
 * 符号反転
 */
function calcuNegated() {
    const valueDisplay = document.getElementById('value-display');
    valueDisplay.innerText = valueDisplay.innerHTML * -1;
    tmp = valueDisplay.innerHTML;
}


/**
 * パーセント表示
 */
function calcuPercent() {
    const valueDisplay = document.getElementById('value-display');
    valueDisplay.innerText = valueDisplay.innerHTML * 0.01;
    tmp = valueDisplay.innerHTML;
}


/**
 * 四則演算のボタンが押され直後の数値入力で表示をクリアするための関数
 */
function vDisplayClea() {
    document.getElementById('value-display').innerText = "";
    keytmp = "";
}