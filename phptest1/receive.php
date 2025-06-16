<?php
// test10
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $comment = $_POST['comment'] ?? '';

    echo h($name) . "さんのコメント：" . h($comment);
} else {
    echo "フォームからの送信ではありません。";
}
