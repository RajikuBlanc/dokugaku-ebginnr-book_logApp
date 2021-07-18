<?php
    $link = mysqli_connect('db', 'book_log', 'pass', 'book_log');

    if (!$link) {
        echo 'ERROR:データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging Error:' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    mysqli_close($link);
    echo 'データベースとの接続を切断しました' . PHP_EOL;
