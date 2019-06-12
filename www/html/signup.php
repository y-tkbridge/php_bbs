<?php
//ユーザー新規登録
require_once __DIR__.'/header.php';

$app = new Bbs\Controller\Signup();
$app->run();

var_dump($_POST);

?>
  <div class="container">
  <form action="" method="post" id="signup" class="form">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign  Up</h5>
            <!-- メールアドレス入力 -->
            <div>
              <label>email address </label>
              <input type="text" 
                name="email" 
                value="<?= isset($app->getValues()->email) ? h($app->getValues()->email) : ''; ?>"class="form-control">
                <p class="err"><?= h($app->getErrors('email')); ?></p>
              </div>
              <!-- ユーザーネーム入力 -->
            <div>
              <label>username</label>
              <input type="text" name="username" value="<?= isset($app->getValues()->username) ? h($app->getValues()->username) : ''; ?>" class="form-control">
              <p class="err"><?= h($app->getErrors('username')); ?></p>
            </div>

              <!-- パスワード入力 -->
              <div>
                <label>password</label>
                <input type="password" name="password" class="form-control">
                <p class="err"><?= h($app->getErrors('password')); ?></p>
              </div>
              <input type="submit" value="sign up">
            <p>
              You have an account?
              <p class="fs12"><a href="<?= SITE_URL; ?>/mypage.php">ログイン</a></p>
            </p>
          </div>
        </div>
      </div>
    </div>
</form>
</div>

<?php require_once __DIR__.'/footer.php'; ?>
