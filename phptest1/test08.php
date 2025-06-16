<?php
// ８

$score = rand(0, 100);
?>

スコア: <?= $score ?><br>

<?php if ($score >= 80): ?>
    判定: 優
<?php elseif ($score >= 60): ?>
    判定: 良
<?php else: ?>
    判定: 可
<?php endif; ?>