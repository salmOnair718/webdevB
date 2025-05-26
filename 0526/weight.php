<?php
//weight.html
//weight.php

// $height = $_POST['height'];
// echo '適正体重は' . $height * $height * 22 . 'kgです。';

// バリデーション
// 範囲を指定、&&=and, ||=or
// 最大値を３とする
// $height = (float)$_POST['height'];
// if ((0 < $height) && ($height < 3)) {
//     echo "適正体重は" . $height * $height * 22 . "kgです。";
// } else {
//     echo "身長を正しく入力してください。";
// }

// php教科書 p127
// $height = (float)$_POST['height'];
// if (0 < $height) {
//     if ($height < 3) {
//         echo "適正体重は" . $height * $height * 22 . "kgです。";
//     }
// } else {
//     echo "身長を正しく入力してください。";
// }

// php教科書 p128
$height = (float)$_POST['height'];
if (0 < $height) {
    if ($height < 3) {
        echo "適正体重は" . $height * $height * 22 . "kgです。";
    } else {
        echo "身長は３より小さい値を入力してください。";
    }
} else {
    echo "身長は０より大きい値を入力してください。";
}
