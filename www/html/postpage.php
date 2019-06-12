<?php 

require 'header.php'; 

$app = new Bbs\Controller\Postpage();
$app->run();

?>
<div class="postpage_container">
<i class="fas fa-cloud-upload-alt"></i>

<form action="postpage.php" method="POST" enctype="multipart/form-data">
  <div id="app">
    <input type="file" name="upload_file" @change="change">
    <div v-if="preview">
        <img style="width:300px; height:auto;" :src="preview">
    </div>
</div>

  <input type="submit" value="ファイルをアップロードする">
</form>

<!-- 画像プレビューエリア -->

<script src="./js/main.js"></script>
</body>

