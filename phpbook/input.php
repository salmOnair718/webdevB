<?php
require_once __DIR__ . '/login_check.php'; // ログインチェック※既に設置済み
// session_start(); //いらないかも。
$token = bin2hex(random_bytes(20));
$_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>サンプルコード</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <?php include __DIR__ . '/inc/header.php'; ?>
    <!-- // 作成した関数の読み込み -->
    <form action="add.php" method="post">
        <p>
            <label for="title">タイトル（必須：200文字まで）：</label>
            <input type="text" id="title" name="title" required>
        </p>
        <p>
            <label for=" isbn">ISBN（13桁までの数字）：</label>
            <input type="text" id="isbn" name="isbn" />
        </p>
        <p>
            <label for="price">定価（6桁までの数字）：</label>
            <input type="text" id="price" name="price" />
        </p>
        <p>
            <label for="publish">出版日（YYYY-MM-DD）：</label>
            <input type="text" id="publish" name="publish" />
        </p>
        <p>
            <label for="author">著者（80文字まで）：</label>
            <input type="text" id="author" name="author" />
        </p>
        <!-- トークンをセッションとフォームに設定する -->
        <!-- フォームで見えんけど値として表示。 -->
        <input type="hidden" name="token" value=" $token" />
        <button type="submit">送信する</button>
    </form>


    <?php include __DIR__ . '/inc/footer.php'; ?>
</body>

</html>