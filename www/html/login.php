<?php
//ログイン
require_once __DIR__.'/header.php';

$app = new Bbs\Controller\Login();
$app->run();

?>
<div class="container">
  <form action="login.php" method="post" id="login" class="form">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <!-- メールアドレス入力 -->
            <div class="form-group">
              <label>email address </label>
              <input type="text" name="email" value="<?= isset($app->getValues()->email) ? h($app->getValues()->email) : ''; ?>" class="form-control">
              </div>
              <!-- パスワード入力 -->
            <div>
            <div class="form-group">
                <label>password</label>
                <input type="password" name="password" class="form-control">
                <p class="err"><?= h($app->getErrors('password')); ?></p>
            </div>
            <p class="err"><?= h($app->getErrors('login')); ?></p>
            <input class="btn btn-primary" type="submit" value="sign in">
            <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
            <p>
              You don't have an account?
              <p class="fs12"><a href="<?= SITE_URL; ?>/signup.php">register</a></p>
            </p>
          </div>
        </div>
      </div>
    </div>
  </form>
</div><!--container -->
<?php require_once __DIR__.'/footer.php'; ?>
