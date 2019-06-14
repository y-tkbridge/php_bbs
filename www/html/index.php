<?php
require_once __DIR__.'/header.php';
require_once __DIR__.'/redirect.php';

$app = new Bbs\Controller\Login();
$app->run();

$postApp = new Bbs\Model\Postpage();
$postAll = $postApp->getPostAll();

?>
<div class="container">
  <div class="user_action_container">
    <div class="item">
      <form class="form-inline my-2 my-lg-0" method="get">
        <input class="form-control mr-sm-2" type="search" name="searchKey" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    <div class="item">
      <!-- <span class="icon_size fas fa-cloud-upload-alt"></span>
      <span class="icon_size fas fa-arrow-circle-up"></span> -->
    </div>
</div>
<div class="content_container row card">
  <?php foreach($postAll as $post) { ?>
    <div class="card col-md-2">
      <h5 class="card-title"><?= $post->username; ?></h5>
        <div class="view view-cascade overlay">
        <img class="card-img-top" src="<?= $post->image_path?>" alt="Card image cap">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
        <div class="card-body card-body-cascade text-center pb-0">
          <h5 class="card-title"><?= $post->title; ?></h5>
          <p class="card-text"><?= $post->comment ?></p>
        </div>
    </div>
  <?php }?>
</div>

<!-- Card Regular -->

<?php
require_once __DIR__.'/footer.php';
?>
