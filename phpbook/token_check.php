<?php
if (!isset($_SESSION)) {
    session_start();
}
if (empty($_POST['token'])) {
    echo "エラーが発生しました。";
    exit;
}
// 2つの文字列が等しいかどうかを調べる
if (!hash_equals($_SESSION['token'], $_POST['token'])) {
    echo "エラーが発生しました。(2)";
    exit;
}
