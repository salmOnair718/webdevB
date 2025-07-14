<?php
function get_all_posts($pdo)
{
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// function insert_post($pdo, $name, $comment)
// {
//     $stmt = $pdo->prepare("INSERT INTO posts (name, comment) VALUES (:name, :comment)");
//     $stmt->execute([
//         ':name' => $name,
//         ':comment' => $comment
//     ]);
// }

function insert_post($pdo, $name, $comment, $bg_color)
{
    $stmt = $pdo->prepare("INSERT INTO posts (name, comment, bg_color) VALUES (:name, :comment, :bg_color)");
    $stmt->execute([
        ':name' => $name,
        ':comment' => $comment,
        ':bg_color' => $bg_color,
    ]);
}

// ① 投稿ごとのリアクションを取得
function get_reactions_by_post(PDO $pdo, int $postId): int
{
    $stmt = $pdo->prepare('SELECT count FROM reactions WHERE post_id = :post_id AND emoji = :emoji');
    $stmt->execute([
        ':post_id' => $postId,
        ':emoji' => '👍'
    ]);
    return (int)($stmt->fetchColumn() ?: 0);
}

// ② リアクションを+1する
function increment_reaction(PDO $pdo, int $postId, string $emoji): void
{
    // すでにあるか確認
    $stmt = $pdo->prepare('SELECT count FROM reactions WHERE post_id = :post_id AND emoji = :emoji');
    $stmt->execute([':post_id' => $postId, ':emoji' => $emoji]);
    $current = $stmt->fetchColumn();

    if ($current === false) {
        // 新規
        $stmt = $pdo->prepare('INSERT INTO reactions (post_id, emoji, count) VALUES (:post_id, :emoji, 1)');
        $stmt->execute([':post_id' => $postId, ':emoji' => $emoji]);
    } else {
        // 更新
        $stmt = $pdo->prepare('UPDATE reactions SET count = count + 1 WHERE post_id = :post_id AND emoji = :emoji');
        $stmt->execute([':post_id' => $postId, ':emoji' => $emoji]);
    }
}
