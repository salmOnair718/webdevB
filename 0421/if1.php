<!-- 比較演算子 -->
<?php
$condition = false;
if ($condition) {
    // 条件式がなければ、値が入っていればtrue
    // bool型にするとtrue、falseで認識する
    echo '条件はtrueです。';
}

?>
<br>
<?php
$a = 1;
$b = "1";
// 代入演算子
var_dump($a);
if ($a === 1) {
    // 整数型
    echo "aは1です。";
}

?>
<br>
<?php
$a = 1;
$b = "1";
if ($a === 1) {
    echo "aは数値型です。";
}
if ($b === "1") {
    echo "bは文字列型です。";
}
if ($a == $b) {
    echo "aとbは等しい値です。";
}


// if else文
echo "<br>";

if ($a === $b) {
    echo "aとbは型も値も等しい値です。";
} else {
    echo "aとbは型が等しくありません。";
}


// if else if文
echo "<br>";
$c = 3;
if ($c === 1) {
    echo "cは1です。";
} elseif ($c === 2) {
    echo "cは2です。";
} else {
    echo "cは1でも2でもありません。";
}


// === と === 以外の比較演算子
echo "<br>";
$d = 4;
if ($d > 1) {
    echo "dは1より大きい値です。";
}
if ($d > 2) {
    echo "dは2より大きい値です。";
}

// 真偽値の比較演算子
echo "<br>";
$e = true;
var_dump($e);
// bool型（true or false）
if ($e === true) {
    // 型も値も一緒
    echo "eはtrueです。";
}

if ($e !== false) {
    // !==は、型or値が違っていたらtrue
    // !がついたら逆
    echo "eはturueです。";
}
