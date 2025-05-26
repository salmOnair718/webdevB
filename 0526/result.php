<?php
// profile.html
// 0526/result.php
// POSTで送信された値を受け取る
echo "<h1>受け取ったデータ</h1>";
echo $_POST['name'] . "さん、こんにちは！<br>";
echo "あなたの年齢は" . $_POST['age'] . "歳ですネ！！！<br>";
echo $_POST['gender'] . "なんですね！！<br>";
// var_dump($_POST);
