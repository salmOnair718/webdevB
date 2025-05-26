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
// $height = (float)$_POST['height'];
// if (0 < $height) {
//     if ($height < 3) {
//         echo "適正体重は" . $height * $height * 22 . "kgです。";
//     } else {
//         echo "身長は３より小さい値を入力してください。";
//     }
// } else {
//     echo "身長は０より大きい値を入力してください。";
// }

// php教科書 p130 131
// 1
// $height = (float)$_POST['height'];
// $weight = (float)$_POST['weight'];

// // 2
// if (!((0 < $height) && ($height < 3))) {
//     echo "身長を正しく入力してください。";
//     exit;
// }
// if (!(($weight < 30) && (200 < $weight))) {
//     echo "体重を正しく入力してください。";
//     exit;
// }

// // 3
// // 適正体重の算出
// $goal_weight = $height * $height * 22;
// // 適性体重との差
// $difference = abs($goal_weight - $weight);

// // 4
// echo "体重" . $weight . "kg<br>";
// echo "理想" . $goal_weight . "kg<br>";
// echo "後" . $difference . "kgで適正体重です。<br>";



// php教科書 p134
// 1
require_once 'function.php';

$height = (float)$_POST['height'];
$weight = (float)$_POST['weight'];

// 2
if (!((0 < $height) && ($height < 3))) {
    echo "身長を正しく入力してください。";
    exit;
}
if (!(($weight < 50) && (200 < $weight))) {
    echo "体重を正しく入力してください。";
    exit;
}

// 3
// 適正体重の算出
$goal_weight = $height * $height * 22;
// 適性体重との差
$difference = abs($goal_weight - $weight);

// 4
echo "体重" . str2html($weight) . "kg<br>";
echo "理想" . str2html($goal_weight) . "kg<br>";
echo "後" . str2html($difference) . "kgで適正体重です。<br>";
