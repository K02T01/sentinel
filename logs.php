<?php

require_once 'DB.php';

// ユーザー情報
$credentials = [
    'email' => 'email@example.com',
    'password' => 'pass'
];
// 登録済みかを確認
$user = Sentinel::getUserRepository()->findByCredentials($credentials);
if (is_null($user)) {
    // 存在しない場合は、新規登録
    $user = Sentinel::register($credentials);
    print_r($user);
}
else {
    // 存在する場合は削除
    $user->delete();
    echo "user deleted".PHP_EOL;
}