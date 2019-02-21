<?php
  session_start();
  ini_set('display_errors',1);
  define('DSN','mysql:host=127.0.0.1;charset=utf8;dbname=bbs');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','secret');
  define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'].'/php_bbs/public_html');
  require_once(__DIR__ . '/../lib/Controller/functions.php');
  require_once(__DIR__ . '/autoload.php');
  

