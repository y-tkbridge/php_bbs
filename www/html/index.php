<?php
require_once __DIR__.'/header.php';
require_once __DIR__.'/redirect.php';

$app = new Bbs\Controller\Login();
$app->run();
// var_dump($_SESSION);
// $threadApp = new Bbs\Model\Thread();
// $thread = $threadApp->getThreadAll();

?>

<div class="container">
  <div class="user_action_container">
    <div class="item">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
    <div class="item">
      <?php // 画像アップロード?>
      <span class="icon_size fas fa-cloud-upload-alt"></span>
      <span class="icon_size fas fa-arrow-circle-up"></span>
      <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">ドロップダウン
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
    <li class="divider"></li>
    <li><a href="#">About Us</a></li>
  </ul>
</div>

    </div>
  </div>
  <h2>index</h2>
  <?= $app->run(); ?>
  <div class="content_container">
    <div class="card" style="width: 18rem;">
      <h5 class="card-title"><?= $title; ?></h5>
        <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwMxDYSYWkBh60UzkcMSAKzCkKdkKhzRR8Q5svOGJTfF4pwNOU" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
  </div>
</div>

<!--  -->
<?php
require_once __DIR__.'/footer.php';
?>
