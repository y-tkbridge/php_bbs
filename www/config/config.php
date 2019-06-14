<?php
  session_start();
  ini_set('display_errors', 0);
  define('DSN', 'mysql:host=php_bbs_db_1;charset=utf8;dbname=story');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', 'secret');
  define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST']);

  require_once __DIR__.'/../lib/Controller/functions.php';
  require_once __DIR__.'/autoload.php';
