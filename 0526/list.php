<?php
# list.php
require_once 'function.php';

try {
    $user = 'phpuser';
    $password = 'xxxxxxxxxx'; // 任意のパスワード
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    ];

    $dbh = new PDO('mysql:host=localhost;dbname=sample_db;charset=utf8', $user, $password, $opt);
    $sql = 'SELECT title, author FROM books';
    # PDOStatementオブジェクトを取得（宣言）
    $statment = $dbh->query($sql);

    # PDOStatementオブジェクトに定着されたfetchメソッドで値を取得
    while ($row = $statment->fetch()) {
        echo '書籍名：' . str2html($row[0]) . '<br>';
        echo '著者名：' . str2html($row[1]) . '<br><br>';
    }
} catch (PDOException $e) {
    echo 'エラー！: ' . str2html($e->getMessage()) . '<br>';
    exit;
}
