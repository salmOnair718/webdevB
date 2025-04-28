<?php
$name = [
    0 => '佐藤',
    1 => '鈴木',
    2 => '高橋'
];
var_dump($name);

$name2 = array(
    0 => '田中',
    1 => '伊藤',
    2 => '渡邉'
);

for ($i = 0; $i < count($name2); $i++) {
    echo $name3[$i] . "<br>";
}
var_dump($name2);

$name3 = ['木下', '遠山', '向井'];
var_dump($name3);
