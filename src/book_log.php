<?php

// DB接続処理
function dbConect()
{
    $link = mysqli_connect('db', 'book_log', 'pass', 'book_log');
    if (!$link) {
        echo 'ERROR:データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging Error:' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    echo 'データベースに接続しました' . PHP_EOL;

    return $link;
}

function validate($reviews)
{
    $errors = [];
    // 書籍名がちゃんと入力されているかチェック
    if (!mb_strlen($reviews['title'])) {
        $errors['title'] = 'Error:書籍名を入力してください';
    } elseif (mb_strlen($reviews['title'])>255) {
        $errors['title'] = '書籍名は255文字以内で入力してください';
    }

    return $errors;
}

function createReview($link)
{
    $reviews = [];
    echo '読書ログを登録してください' . PHP_EOL;

    echo '書籍名:';
    $reviews['title'] = trim(fgets(STDIN));

    echo '著者名:';
    $reviews['name'] = trim(fgets(STDIN));

    echo '読書状況（未読,読んでる,読了）:';
    $reviews['status'] = trim(fgets(STDIN));

    echo '評価:';
    $reviews['lank'] = trim(fgets(STDIN));

    echo '感想:';
    $reviews['text'] = trim(fgets(STDIN));


    $validated = validate($reviews);

    if (count($validated) > 0) {
        foreach ($validated as $error) {
            echo $error . PHP_EOL;
        }
        // returnを書くことで処理を止める
        // returnを書かなければ、エラーが出たとしても処理が止まらないので、データベースに保存されてしまう
        return;
    }



    $sql = <<<EOT
        INSERT INTO reviews(
            title, name, status, lank, text
            )
            VALUES(
                "{$reviews['title']}",
                "{$reviews['name']}",
                "{$reviews['status']}",
                "{$reviews['lank']}",
                "{$reviews['text']}"
            );
    EOT;

    $result = mysqli_query($link, $sql);
    if ($result) {
        echo '登録が完了しました。' . PHP_EOL;
    } else {
        echo 'ERROR:データの保存に失敗しました' . PHP_EOL;
        echo 'Debbuging Error:' . mysqli_error($link) . PHP_EOL . PHP_EOL;
    }
}

function listReview($reviews)
{
    echo '読書ログを表示します' . PHP_EOL;
    foreach ($reviews as $review) {
        echo '書籍名:' . $review['title'] . PHP_EOL;
        echo '著者名:' . $review['name'] . PHP_EOL;
        echo '読書状況（未読,読んでる,読了）:' . $review['status'] . PHP_EOL;
        echo '評価（5点満点の整数）:' . $review['lank'] . PHP_EOL;
        echo '感想:' . $review['text'];
        echo "-------------" . PHP_EOL;
    }
};

$reviews = [];
$link = dbConect();

while (true) {
    echo '1.読書ログを登録' . PHP_EOL;
    echo '2.読書ログを表示' . PHP_EOL;
    echo '3.アプリケーションを終了' . PHP_EOL;
    echo '番号を選択してください(1,2,9):';
    $num = trim(fgets(STDIN));

    if ($num === '1') {
        createReview($link);
    } elseif ($num === '2') {
        listReview($reviews);
    } elseif ($num === '9') {
        mysqli_close($link);
        break;
    }
}