<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../../functions.php';

// DB接続
$pdo = new PDO($config['dsn'], $config['user'], $config['pass']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// バリデーション関数
function validate_post(string $name, string $comment): array
{
    $errors = [];
    if ($name === '') {
        $errors[] = '名前を入力してください。';
    }
    if ($comment === '') {
        $errors[] = 'コメントを入力してください。';
    }
    return $errors;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ✅ リアクションボタンが押されたとき
    if (isset($_POST['reaction_post_id'], $_POST['emoji'])) {
        $postId = (int)$_POST['reaction_post_id'];
        $emoji = trim($_POST['emoji']);
        increment_reaction($pdo, $postId, $emoji);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    // ✅ 投稿処理（リアクションでない場合）
    $name = trim($_POST['name'] ?? '');
    $comment = trim($_POST['comment'] ?? '');
    $bgColor = trim($_POST['bg_color'] ?? '');

    $errors = validate_post($name, $comment);

    if ($bgColor === '') {
        $errors[] = '背景色を選んでください。';
    }

    if (empty($errors)) {
        insert_post($pdo, $name, $comment, $bgColor);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
$posts = get_all_posts($pdo);

foreach ($posts as &$post) {
    $post['reaction_count'] = get_reactions_by_post($pdo, $post['id']);
}


require __DIR__ . '/../views/layout.php';
