<?php require_once __DIR__ . '/login_check.php'; ?>
<?php
session_start();
require_once __DIR__ . '/inc/functions.php';
include __DIR__ . '/inc/header.php';
?>
<form method="post" action="login.php">
    <p>
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username">
    </p>
    <p>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password">
    </p>
    <button type="submit">ログイン</button>
</form>

<?php
if (!empty($_SESSION['login'])) {
    echo "ログイン済です！<br>";
    echo "<a href='index.php'>リストに戻る</a>";
    exit;
}

if ((empty($_POST['username']) || empty($_POST['password']))) {
    echo "ユーザー名とパスワードを入力してください。";
    exit;
}

try {
    $dbh = db_open();
    $sql = 'SELECT password FROM users WHERE username = :username';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "ログインに失敗しました。";
        exit;
    }

    // var_dump($_POST['password'], $result['password']);
    if (password_verify($_POST['password'], $result['password'])) {
        session_regenerate_id(true);
        $_SESSION['login'] = true;
        header('Location: index.php');
    } else {
        echo 'ログインに失敗しました。(2）';
    }
} catch (PDOException $e) {
    echo 'エラー: ' . str2html($e->getMessage());
    exit;
}

include __DIR__ . '/inc/footer.php';
