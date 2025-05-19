<?php

require_once 'function.php';
// 一度だけ読み込む
// require　=　読み込まれないとエラーになり、処理が止まる

// データを読み込む→$fp変数に代入
$fp = fopen('bookdata.csv', 'r');
// var_dump($fp);

// ファイルが開けたか確認
if ($fp === false) {
    echo `ファイルのオープンに失敗しました`;
    exit;
}
//1行を処理する
// $row = fgetcsv($fp);
// row=行
// head=見出し
// column=段
// var_dump($row);

//書籍名と著者名を表示する
// while ($row = fgetcsv($fp)) {
//     echo '<ul>';
//     echo '<li>' . "書籍名："  . $row[0] . '</li>';
//     echo '<li>' . "著者名："  . $row[4] . '</li>';
//     echo '</ul>';
// }


//書籍名と著者名を表示する
//htmlspecialchars()関数を使ってXSS対策を行う
while ($row = fgetcsv($fp)) {
    echo '<ul>';
    echo '<li>' . "書籍名："  . str2html($row[0]) . '</li>';
    echo '<li>' . "著者名："  . str2html($row[4]) . '</li>';
    echo '</ul>';
}
