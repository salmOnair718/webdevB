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

    <p>background：</p>
    <div class="color-options">
        <?php foreach ($availableColors as $colorCode => $colorName): ?>
            <label class="color-circle">
                <input type="radio" name="bg_color" value="<?= $colorCode ?>" required>
                <span class="circle" style="background-color: <?= $colorCode ?>"></span>
            </label>
        <?php endforeach; ?>
    </div>

    <input type="submit" value="投稿" class="submit-button" />
    </p>
</form>
<hr />


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