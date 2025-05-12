<html>

<body>
    <?php
    $name = [
        '1' => '佐藤',
        '2' => '鈴木',
        '3' => '高橋',
    ];

    // foreachの代替構文
    foreach ($name as $key => $value): ?>
        <p>
            <?php echo $key; ?>人目は <?php echo $value; ?>さんです。
        </p>
    <?php endforeach; ?>
</body>

</html>