<?php
# 1. 配列 ['赤', '青', '黄'] を作成し、foreach で各要素を1行ずつ表示してください。
$name = [
    0 => '赤',
    1 => '青',
    2 => '黄'
];
foreach ($name as $value) {
    echo $value;
}

# 2. ['りんご' => 150, 'バナナ' => 120, 'みかん' => 100] の配列から「フルーツ名：価格円」と表示してください。
$name2 = [
    'りんご' => 150,
    'バナナ' => 120,
    'みかん' => 100
];
foreach ($name2 as $key => $value) {
    echo $key . "：" . $value . "円<br>";
}
# 3. [100, 200, 300] という配列の合計値を求めて表示してください（foreach を使って）。
$name3 = [100, 200, 300];
$sum = 0;
foreach ($name3 as $value) {
    $sum += $value;
}
echo $sum . "<br>";

# 4. ['PHP', 'JavaScript', 'Python'] という配列に foreach を使って、インデックス番号と一緒に表示してください（例: 0: PHP）。
$name4 = ['PHP', 'JavaScript', 'Python'];
foreach ($name4 as $index => $value) {
    echo $index . ": " . $value . "<br>";
}

# 5. ['A', 'B', 'C'] の各要素に「さん」を付けて表示してください（例: Aさん）。
$name5 = ['A', 'B', 'C'];
foreach ($name5 as $value) {
    echo $value . "さん<br>";
}

# 6. [10, 20, 30] の各値を2倍にして出力してください。
$name6 = [10, 20, 30];
foreach ($name6 as $value) {
    echo $value * 2 . "<br>";
}

#7. 配列でサンリオのキャラクターを20個作成してください。
$name7 = [
    'ハローキティ',
    'マイメロディ',
    'シナモロール',
    'ポムポムプリン',
    'リトルツインスターズ',
    'ぐでたま',
    'バッドばつ丸',
    'タキシードサム',
    'けろけろけろっぴ',
    'クロミ',
    'あひるのペックル',
    'ウィッシュミーメル',
    'ポチャッコ',
    'チアリーチャム',
    'ハンギョドン',
    'バツ丸',
    'マロンクリーム',
    'キキララ',
    'タキシードサム'
];
foreach ($name7 as $value) {
    echo $value . "<br>";
}
