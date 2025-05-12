<?php
//1. 変数 $num = 10 が偶数なら「偶数です」と表示するコードを書いてください。

$num = 10;
if ($num % 2 === 0) {
    echo "偶数です";
}

//2. 変数 $age = 20 が 20 以上かつ 30 未満なら「20代です」と表示するコードを書いてください。

$age = 20;
if ($age >= 20) {
    if ($age < 30) {
        echo "20代です";
    }
};


/*3. 変数c に対して、以下の条件分岐を作成してください。
	• $x が 10 より小さい →「10より小さい」
	• $x が 10 →「ちょうど10」
	• $x が 10 より大きい →「10より大きい」*/
$x = 10;
if ($x < 10) {
    echo "10より小さい";
}

if ($x === 10) {
    # 基本同じを判定したい時には＝＝＝を使う。値も型も同じだから
    echo "ちょうど10";
}

if ($x > 10) {
    echo "10より大きい";
}

//4. 変数 $password = "secret" に対して、入力されたパスワード $input = "secret" が正しければ「ログイン成功」、違えば「パスワードが間違っています」と表示するコードを書いてください。
$password = "secret";
$input = "secret";

if ($password === $input) {
    echo "ログイン成功";
} else {
    echo "パスワードが間違っています。";
}

//5. input.html と question3.php を連携させて、変数 $loggedIn = "true" の場合に「ようこそ」それ以外に場合には「ログインしてください」と表示するコードを書いてください。

echo $_POST['login_status'];
$loggedIn = $_POST['login_status'];
// var_dump($loggedIn);
if ($loggedIn === "true") {
    echo "ようこそ";
} else {
    echo "ログインしてください";
}
