<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/style.css">

    <style>
        body {
            background-color: rgba(255, 255, 255, 1);
            background-image: linear-gradient(90deg, transparent 0%, transparent 50%, #fff 50%, #fff 100%),
                /* 線1 */
                linear-gradient(180deg, #b7ecfbff 1px, transparent 1px);
            /* 線2 */
            background-size: 8px 100%,
                /* 線1 */
                100% 3.5em;
            /* 線2 */

            line-height: 1.7em;
            margin: 50px auto;
            width: 90%;
        }


        h1 {
            color: #000;
            text-align: center;
            margin-top: 50px;
        }

        hr {
            margin: 50px 0;
        }

        .created_at {
            font-weight: bold;
        }

        /* ✅ 投稿全体を整列させるコンテナ */
        .posts-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 24px;
            /* padding: 20px; */
            justify-items: center;
        }

        .post-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* ✅ hover時に角度を戻す */
        .post-card:hover {
            transform: rotate(0deg) scale(1.02);
        }



        .post-form {
            /* max-width: 480px; */
            width: 60%;
            margin: 0 auto;
            background-color: rgb(237, 237, 237);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            font-family: sans-serif;
        }

        .post-form p {
            margin-bottom: 16px;
        }

        .input-name,
        .input-comment,
        .input-tags {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px dashed #333;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .input-comment {
            /* resize: vertical; */
            height: 150px;
        }

        .search {
            width: 60%;
            margin: 0 auto;
            /* display: block; */
            padding: 10px;
            font-size: 14px;
            border: 1px dashed #333;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .search_button {
            padding: 10px 30px;
            background-color: #333;
            color: #fff;
            font-size: 18px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .search_button:hover {
            background-color: #555;
        }


        .color-options {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding-top: 4px;
        }

        /* 背景色選択ボタン */
        .color-circle {
            position: relative;
            cursor: pointer;
        }

        .color-circle input[type="radio"] {
            display: none;
        }

        .color-circle .circle {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid #ccc;
            box-sizing: border-box;
            transition: border 0.2s ease;
        }

        /* 選択された色だけ枠をつける */
        .color-circle input[type="radio"]:checked+.circle {
            border: 3px solid #333;
        }

        /* 投稿ボタン */
        .submit-button {
            padding: 10px 30px;
            background-color: #333;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            display: block;
            margin: 20px 0 0 auto;
            transition: background-color 0.2s;
        }

        .submit-button:hover {
            background-color: #555;
        }

        /* 投稿グッドボタン背景 */
        .good-button {
            background-color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 20px;
            line-height: 40px;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            transition: transform 0.1s ease;
        }

        .good-button:hover {
            transform: scale(1.1);
        }

        .reaction-count {
            font-size: 16px;
            color: #333;
        }
    </style>
</head>

<body>
    <h1>掲示板</h1>

    <?php if (!empty($errors)): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $error): ?>
                <li><?= str2html($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php include __DIR__ . '/index.php'; ?>
</body>

</html>