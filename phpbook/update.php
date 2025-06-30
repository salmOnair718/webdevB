<?php
require_once __DIR__ . '/inc/functions.php';
include __DIR__ . '/inc/error_check.php';
require_once __DIR__ . '/login_check.php';
require_once __DIR__ . '/token_check.php';
include __DIR__ . '/inc/header.php';


// idのチェック
if (empty($_POST['id'])) {
    echo 'idを指定してください。';
    exit;
}
if (!preg_match('/\A\d{0,11}\z/u', $_POST['id'])) {
    echo 'idが正しくありません。';
    exit;
}
# 空欄チェック
if (empty($_POST['title'])) {
    echo 'タイトルは必須です。';
    exit;
}
# 文字数チェック
# uは、パターン修飾子で、Unicode文字を含む正規表現にマッチすることを示す
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
    $sql = 'UPDATE books SET title = :title, isbn = :isbn, price = :price, publish = :publish, author = :author WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $id = (int)$_POST['id'];
    // bindParam() メソッドを使って、プレースホルダに値をバインドします。
    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':isbn', $_POST['isbn'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
    $stmt->bindParam(':publish', $_POST['publish'], PDO::PARAM_STR);
    $stmt->bindParam(':author', $_POST['author'], PDO::PARAM_STR);
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $stmt->execute();
    echo 'データが更新されました。';
    echo '<a href="index.php">リストへ戻る</a>';
} catch (PDOException $e) {
    echo 'エラー！: ' . str2html($e->getMessage()) . '<br>';
    exit;
}
include __DIR__ . '/inc/footer.php';
