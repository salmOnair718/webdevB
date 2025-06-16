<?php
// 4
$score = rand(0, 100);
echo "スコア: $score<br>";
if ($score >= 80) {
    echo "判定: 優<br>";
} elseif ($score >= 60) {
    echo "判定: 良<br>";
} else {
    echo "判定: 可<br>";
}
