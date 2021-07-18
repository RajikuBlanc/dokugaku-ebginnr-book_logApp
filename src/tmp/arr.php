<?php
// 配列
// $comics = ['火の鳥','ガラスの仮面'];
// $comics[] = 'BANANA FISH';
// var_export($comics);
// var_dump($comics);
// echo $comics[2] . PHP_EOL;

// 連想配列
$user = [
    'name' => 'John',
    'sex' => 'mail',
];

$user['age'] = 20;

echo $user['name'] . PHP_EOL;
// var_export($user);



while (true) {
    echo '1.読書ログを登録' . PHP_EOL;
    echo '2.読書ログを表示' . PHP_EOL;
    echo '3.アプリケーションを終了' . PHP_EOL;
    echo '番号を選択してください(1,2,9):';
    $num = trim(fgets(STDIN));

    if ($num === '1') {
        echo '読書ログを登録してください' . PHP_EOL;
        echo '書籍名:';
        $title = trim(fgets(STDIN));

        echo '著者名:';
        $name = trim(fgets(STDIN));

        echo '読書状況（未読,読んでる,読了）:';
        $status = trim(fgets(STDIN));

        echo '評価:';
        $lank = trim(fgets(STDIN));

        echo '感想:';
        $text = trim(fgets(STDIN));

        echo '登録が完了しました。' . PHP_EOL . PHP_EOL;
    } elseif ($num === '2') {
        echo '読書ログを表示します' . PHP_EOL;
        echo '書籍名:' . $title . PHP_EOL;
        echo '著者名:' . $name . PHP_EOL;
        echo '読書状況（未読,読んでる,読了）:' . $status . PHP_EOL;
        echo '評価（5点満点の整数）:' . $lank . PHP_EOL;
        echo '感想:' . $text;
        echo '読書ログを登録してください' . PHP_EOL;
    } elseif ($num === '9') {
        break;
    }
}