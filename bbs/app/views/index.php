<!-- 投稿フォーム -->
<!-- <form action="" method="post"> -->
<!-- <p>name：<input type="text" name="name" /></p>
    <p>comment：<textarea name="comment" rows="4" cols="40"></textarea></p>
    <p>
        <input type="submit" value="投稿" />
    </p>

</form> -->

<?php
// 投稿用の背景色選択肢
$availableColors = [
    '#FDE2E2' => 'ピンク',
    '#f9ffc7' => 'レモンイエロー',
    '#d8f5d3' => 'グリーン',
    '#ccf3ff' => '水色',
    '#E6E6FA' => 'ラベンダー',
];
?>

<!-- 投稿フォーム -->
<form action="" method="post" class="post-form">
    <p>
        name：<input type="text" name="name" class="input-name" />
    </p>
    <p>
        comment：<textarea name="comment" rows="4" cols="40" class="input-comment"></textarea>
    </p>

    <p>
        #tags：<input type="text" name="tags" class="input-tags" placeholder="#question  #topic  #news  etc...." />
    </p>


    <p>background：</p>
    <div class="color-options">
        <?php foreach ($availableColors as $colorCode => $colorName): ?>
            <label class="color-circle">
                <input type="radio" name="bg_color" value="<?= $colorCode ?>" required>
                <span class="circle" style="background-color: <?= $colorCode ?>"></span>
            </label>
        <?php endforeach; ?>
    </div>

    <input type="submit" value="post" class="submit-button" />
    </p>
</form>
<hr />


<!-- 🔍 検索フォーム -->
<form method="get" action="" style="margin-bottom: 20px;">
    <input type="text" name="search" class="search" placeholder="keyword" value="<?= isset($_GET['search']) ? str2html($_GET['search']) : '' ?>" />
    <button type="submit" class="search_button">search</button>
</form>

<?php if (!empty($posts)): ?>
    <div class="posts-container">
        <?php foreach ($posts as $post): ?>
            <?php
            // ✅ もし null ならデフォルトの色を使う
            $bgColor = $post['bg_color'] ?? '#f9ffc7';
            // ✅ 付箋ごとに角度をランダムにする（-5度〜+5度くらいで自然）
            $rotation = rand(-5, 5);
            ?>
            <div class="post-card" style="margin: 20px 0;
        background-color: <?= str2html($bgColor) ?>;
        transform: rotate(<?= $rotation ?>deg);
        aspect-ratio: 1/1;
        padding: 15px;
        width:250px;
        position: relative">
                <p>
                    <strong><?= str2html($post['name']) ?></strong> さん
                </p>
                <p><?= nl2br(str2html($post['comment'])) ?></p>

                <?php
                // タグがある場合、カンマ区切りを配列に変換
                $tags = [];
                if (!empty($post['tags'])) {
                    $tags = array_map('trim', explode(',', $post['tags']));
                }
                ?>

                <?php if (!empty($tags)): ?>
                    <div class="tags" style="margin-top: 5px;">
                        <?php foreach ($tags as $tag): ?>
                            <a href="?tag=<?= urlencode($tag) ?>" class="tag" style="font-size: 12px; color: #555; margin-right: 5px;">#<?= htmlspecialchars($tag) ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <p style="color:rgb(131, 131, 131); font-size: 12px; position: absolute; bottom: 15px; right: 15px; margin: 0;">
                    <small><?= str2html($post['created_at']) ?></small>
                </p>
                <!-- ✅ リアクションボタン -->
                <div style="margin-top:10px; display: flex; align-items: center; gap: 6px;position: absolute; bottom: 15px;left: 15px;">
                    <form action="" method="post" style="display:inline; display: flex; align-items: center; gap: 6px;">
                        <input type="hidden" name="reaction_post_id" value="<?= $post['id'] ?>">
                        <input type="hidden" name="emoji" value="👍">
                        <button type="submit" class="good-button">👍</button>
                        <span class="reaction-count"><?= $post['reaction_count'] ?></span>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>投稿はまだありません。</p>
<?php endif; ?>