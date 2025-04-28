<?php
$name = [
    0 => '佐藤',
    1 => '鈴木',
    2 => '高橋'
];
var_dump($name);

echo $name['takahashi'];

for ($i = 0; $i < count($name2); $i++) {
    echo $name3[$i] . "<br>";
}
foreach ($name as $key => $value) {
    echo 'キーは' . $key . '、名前は' . $value . '<br>';
}
