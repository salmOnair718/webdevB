<?php
$fp = fopen('songs.csv', 'r');

// ファイルが開けたか確認
if ($fp === false) {
    echo 'ファイルのオープンに失敗しました';
    exit;
}

$text = $_POST["song"];
echo $text;
// 読み込み

// csvの中を $row = fgetcsv($fp)
while ($row = fgetcsv($fp)) {
    // echo "<li>" . $row[0] . "</li>";
    if ($text === $row[0]) {
        echo "<li>" . $row[1] . "</li>";
        echo "<li>" . $row[2] . "</li>";
        echo "<li>" . $row[3] . "</li>";
        echo "<li>" . $row[4] . "</li>";
    };
    if ($text === $row[1]) {
        echo "<li>" . $row[1] . "</li>";
        echo "<li>" . $row[2] . "</li>";
        echo "<li>" . $row[3] . "</li>";
        echo "<li>" . $row[4] . "</li>";
    };
    if ($text === $row[2]) {
        echo "<li>" . $row[1] . "</li>";
        echo "<li>" . $row[2] . "</li>";
        echo "<li>" . $row[3] . "</li>";
        echo "<li>" . $row[4] . "</li>";
    };
    if ($text === $row[3]) {
        echo "<li>" . $row[1] . "</li>";
        echo "<li>" . $row[2] . "</li>";
        echo "<li>" . $row[3] . "</li>";
        echo "<li>" . $row[4] . "</li>";
    };
    if ($text === $row[]) {
        echo "<li>" . $row[1] . "</li>";
        echo "<li>" . $row[2] . "</li>";
        echo "<li>" . $row[3] . "</li>";
        echo "<li>" . $row[4] . "</li>";
    };
};
