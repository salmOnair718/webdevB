<?php

// 全投稿を取得（新着順）
function get_all_posts($pdo)
{
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// タグで絞り込んで投稿を取得
function get_posts_by_tag(PDO $pdo, string $tag): array
{
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE tags LIKE :tag ORDER BY created_at DESC");
    $stmt->execute([':tag' => '%' . $tag . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 投稿を追加（背景色あり、タグ対応）
function insert_post($pdo, $name, $comment, $bg_color, $tags = '')
{
    $stmt = $pdo->prepare("INSERT INTO posts (name, comment, bg_color, tags) VALUES (:name, :comment, :bg_color, :tags)");
    $stmt->execute([
        ':name' => $name,
        ':comment' => $comment,
        ':bg_color' => $bg_color,
        ':tags' => $tags,
    ]);
}

// リアクション数を取得
function get_reactions_by_post(PDO $pdo, int $postId): int
{
    $stmt = $pdo->prepare('SELECT count FROM reactions WHERE post_id = :post_id AND emoji = :emoji');
    $stmt->execute([
        ':post_id' => $postId,
        ':emoji' => '👍'
    ]);
    return (int)($stmt->fetchColumn() ?: 0);
}

// リアクションを1つ増やす
function increment_reaction(PDO $pdo, int $postId, string $emoji): void
{
    $stmt = $pdo->prepare('SELECT count FROM reactions WHERE post_id = :post_id AND emoji = :emoji');
    $stmt->execute([':post_id' => $postId, ':emoji' => $emoji]);
    $current = $stmt->fetchColumn();

    if ($current === false) {
        // 新規登録
        $stmt = $pdo->prepare('INSERT INTO reactions (post_id, emoji, count) VALUES (:post_id, :emoji, 1)');
        $stmt->execute([':post_id' => $postId, ':emoji' => $emoji]);
    } else {
        // 更新
        $stmt = $pdo->prepare('UPDATE reactions SET count = count + 1 WHERE post_id = :post_id AND emoji = :emoji');
        $stmt->execute([':post_id' => $postId, ':emoji' => $emoji]);
    }
}

function search_posts(PDO $pdo, string $keyword): array
{
    $like = '%' . $keyword . '%';
    $stmt = $pdo->prepare("
        SELECT * FROM posts
        WHERE name LIKE :kw OR comment LIKE :kw OR tags LIKE :kw
        ORDER BY created_at DESC
    ");
    $stmt->execute([':kw' => $like]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
