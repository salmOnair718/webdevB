<?php

require_once __DIR__ . '/inc/functions.php';
include __DIR__ . '/inc/error_check.php';
require_once __DIR__ . '/token_check.php';
include __DIR__ . '/inc/header.php';

# add.php
// var_dump($_POST);
require_once __DIR__ . '/inc/functions.php';

// 空欄チェック
if (empty($_POST['title'])) {
    echo 'タイトルは必須です。';
    exit;
}

// 文字数チェック
// uは、パターン修飾子で、Unicode文字を含む正規表現にマッチすることを示す
if (!preg_match('/\A[[:^cntrl:]]{1,200}\z/u', $_POST['title'])) {
    echo 'タイトルは200文字までです。';
    exit;
}

# ISBN（13桁)チェック
if (!preg_match('/\A\d{0,13}\z/', $_POST['isbn'])) {
    echo 'ISBNは数字13桁までです。';
    exit;
}

# 定価（6桁）チェック
if (!preg_match('/\A\d{0,6}\z/u', $_POST['price'])) {
    echo '定価は数字6桁までです。';
    exit;
}
# 日付必須チェック
if (empty($_POST['publish'])) {
    echo '日付は必須です。';
    exit;
}

# 出版日（yyyy-mm-dd）チェック
if (!preg_match('/\A\d{4}-\d{1,2}-\d{1,2}\z/u', $_POST['publish'])) {
    echo '日付のフォーマットが違います。';
    exit;
}

# 正しい日付チェック
$date = explode('-', $_POST['publish']);
if (!checkdate($date[1], $date[2], $date[0])) {
    echo '正しい日付を入力してください。';
    exit;
}

# 著者（80文字）チェック
if (!preg_match('/\A[[:^cntrl:]]{1,80}\z/u', $_POST['author'])) {
    echo '著者名は80文字以内で入力してください。';
    exit;
}

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

    $sql = "INSERT INTO books (id, title, isbn, price, publish, author)
VALUES (NULL, :title, :isbn, :price, :publish, :author)";

    # prepare() メソッドを使って、SQL文を準備します。
    $stmt = $dbh->prepare($sql);
    $price = (int)$_POST['price'];
    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':isbn', $_POST['isbn'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':publish', $_POST['publish'], PDO::PARAM_STR);
    $stmt->bindParam(':author', $_POST['author'], PDO::PARAM_STR);

    $stmt->execute();
    echo "データが追加されました。<br>";
    echo "<a href='index.php'>リストに戻る</a>";
} catch (PDOException $e) {
    echo 'エラー！！！: ' . str2html($e->getMessage()) . "<br>";
    exit;
}
include __DIR__ . '/inc/footer.php';
// var_dump($stmt);
// var_dump($_POST);
