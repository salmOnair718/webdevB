<?php
// $str = "〒450-0002 愛知県名古屋市中村区名駅3-24-15";
// preg_match('/\d{3}-\d{4}/u', $str, $matches);
// var_dump($matches);

$str = "12345678";
$rtn = preg_match("/\A\d{7}\z/u", $str);
// "/\d{7}/uは数字７桁を表す正規表現
$str02 = "1234567あ";
$rtn02 = preg_match("/\A\d{7}\z/u", $str02);

$str03 = "111-1234567";
$rtn03 = preg_match("/\A\d{7}\z/u", $str03);

$str04 = "1234567";
$rtn04 = preg_match("/\A\d{7}\z/u", $str04);


echo "結果01";
var_dump($rtn);

echo "結果02";
var_dump($rtn02);

echo "結果03";
var_dump($rtn03);

echo "結果04";
var_dump($rtn04);
