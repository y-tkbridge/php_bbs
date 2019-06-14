<?php 

require 'header.php';

$app = new Bbs\Model\Attribute();
$category = $app->getAllCategory();

?>
<div class="postpage_container card" id="app">
  <form class="formrun" action="<?= SITE_URL.'/postpage_comp.php'?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input class="form-control" type="text" name="title" placeholder="title">
        <input class="form-control" type="text" name="comment" placeholder="comment">
    </div>
      <div class="item">
        <input type="file" alt="投稿"　name="upload_file" @change="change">
        <input type="submit" value="ファイルをアップロードする">
    </div>
    <div class="preview_area">
      <span  v-if="preview">
        <img class="preview_img" :src="preview">
      </span>
    </div>
  </form>
</div>

<script src="./js/main.js"></script>


