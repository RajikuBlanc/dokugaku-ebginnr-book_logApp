<?php
    $link = mysqli_connect('db', 'book_log', 'pass', 'book_log');

    if (!$link) {
        echo 'ERROR:データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging Error:' . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    echo 'データベースに接続しました' . PHP_EOL;

    $sql =<<<EOT
        INSERT INTO reviews(
            title, name, text
        ) VALUES(
            'TITLE', 'NAME', 'TEXT'
        )
    EOT;

    $result = mysqli_query($link, $sql);

    if ($result) {
        echo 'データを追加しました' . PHP_EOL;
    } else {
        echo 'ERROR:データの追加に失敗しました' . PHP_EOL;
        echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
    }



    mysqli_close($link);
    echo 'データベースとの接続を切断しました' . PHP_EOL;
