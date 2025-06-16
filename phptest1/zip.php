<?php
// test11

// 入力値を取得
$zip1 = $_POST['zip1'] ?? '';
$zip2 = $_POST['zip2'] ?? '';

// 郵便番号判定
$fullZip = $zip1 . '-' . $zip2;

if (!preg_match('/^\d{3}-\d{4}$/', $fullZip)) {
    echo "郵便番号 {$fullZip} は正しい形式です。";
} else {
    echo "郵便番号 {$fullZip} は不正な形式です。";
}
