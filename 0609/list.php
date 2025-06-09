<?php
# connect1.php
require_once 'functions.php';

try {
    $dbh = db_open();
    // $user = 'phpuser';
    // $password = 'php0602_bd'; // 任意のパスワード
    // $opt = [
    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //     PDO::ATTR_EMULATE_PREPARES => false,
    //     PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    // ];

    // $dbh = new PDO('mysql:host=localhost;dbname=sample_db;charset=utf8', $user, $password, $opt);

    $sql = 'SELECT title, author FROM books';
    $statement = $dbh->query($sql);

    while ($row = $statement->fetch()) {
        echo '書籍名：' . str2html($row[0]) . '<br>';
        echo '著者名：' . str2html($row[1]) . '<br><br>';
    }
    // var_dump($dbh);

} catch (PDOException $e) {
    echo '接続失敗: ' . str2html($e->getMessage()) . "<br>";
    exit;
}
