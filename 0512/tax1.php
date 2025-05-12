<?php
// 関数の定義
// 定義しただけでは実行されない
// 価格をパラメータ入力したら、税込価格を表示する（echo）関数(関数の実行)
function tax($price)
{
    echo $price * 1.1;
}

// 関数の実行
// 関数名に続けて（）をつけて、中にパラメータの値を入れる
tax(100);

// 変数の定義（戻り値・返り血がある関数）
function tax2($price)
{
    return $price * 1.1;
}

// 関数の実行
tax2(100);
$sample_price = tax2('文字列');
echo '消費税込値段:' . $sample_price . '円';
