<?php
//ユーザー新規登録
require_once __DIR__.'/header.php';
$app = new Bbs\Controller\Signup();
$app->run();

$loginApp = new Bbs\Controller\Login();
$loginApp->run();
