<?php
require_once __DIR__ . '/functions02.php';

$affiliation = $_POST['group'] ?? '';
$name = $_POST['name'] ?? '';
$age = $_POST['age'] ?? '';

$errors = [];

if (trim($affiliation) === '' || mb_strlen($affiliation) > 20) {
    $errors[] = '所属グループは、1〜20文字で入力してください。';
}
if (trim($name) === '' || mb_strlen($name) > 15) {
    $errors[] = '名前は、1〜15文字で入力してください。';
}
if (!ctype_digit($age) || (int)$age < 0 || (int)$age > 999) {
    $errors[] = '年齢は、0〜999の数字で入力してください。';
}

if (!empty($errors)) {
    foreach ($errors as $e) {
        echo "<p style='color:red'>" . htmlspecialchars($e, ENT_QUOTES, 'UTF-8') . "</p>";
    }
    echo '<a href="./form.php">戻る</a>';
    exit;
}

try {
    $pdo = db_open();

    $sql = "INSERT INTO members (affiliation, name, age) VALUES (:affiliation, :name, :age)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':affiliation', $affiliation);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ./");
    exit;
} catch (PDOException $e) {
    echo "エラー!!: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    exit;
}
