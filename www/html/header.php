<?php
require_once __DIR__.'/../config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>画像投稿サイト</title>
  <link href="https://fonts.googleapis.com/css?family=Charm|M+PLUS+Rounded+1c&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/css/uikit-core-rtl.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <script src="./js/bbs.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<header class="sticky-top header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Story</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?= SITE_URL; ?>/index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <?php if (isset($_SESSION['me'])) {?>
      <li class="nav-item">
        <a class="nav-link " href="<?= SITE_URL; ?>/postpage.php">PostPage<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="<?= SITE_URL; ?>/profile.php">Profile</a>
      </li>
      <?php } ?>
    </ul>
    <div class="user_action_container">
    </div>
      <?php if (isset($_SESSION['me'])) {?>
        <form action="<?= SITE_URL; ?>/logout.php" method="post" id="logout">
            <input type="submit" value="ログアウト">
            <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
        </form>
      <?php } else { ?>
        <li class="btn my-2 my-sm-0"><a href="<?= SITE_URL; ?>/login.php">ログイン</a></li>
        <li class="btn my-2 my-sm-0"><a href="<?= SITE_URL; ?>/signup.php">ユーザー登録</a></li>
      <?php } ?>
  </div>
</nav>
</header>


