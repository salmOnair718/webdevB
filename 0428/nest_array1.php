<?php
$people[] = ['name' => '佐藤', 'blood' => 'A'];
$people[] = ['name' => '田中', 'blood' => 'B'];
$people[] = ['name' => '加藤', 'blood' => 'O'];

var_dump($people);

echo $people[0]['blood'] . "<br>"; // A
echo $people[2]['name']; // 加藤
foreach ($people as $key => $value) {
    // echo 'キーは' . $key . '、値は' . $value . '<br>';
    foreach ($value as $key2 => $value2) {
        echo 'キーは' . $key2 . '、値は' . $value2 . '<br>';
    }
}

#2次元配列を作ってください。
$people2 = [
    ['name' => '佐藤', 'blood' => 'A'],
    ['name' => '田中', 'blood' => 'B'],
    ['name' => '加藤', 'blood' => 'O']
];
var_dump($people2);
