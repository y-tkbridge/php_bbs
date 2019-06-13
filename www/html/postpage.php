<?php 

require 'header.php'; 

$app = new Bbs\Controller\Postpage();
$app->run();

?>
<div class="postpage_container">
  <div id="app">
    <form action="postpage.php" method="POST" enctype="multipart/form-data">
        <div class="preview_area" v-if="preview">
                <img class="preview_img" :src="preview">
        </div>
        <div class="post_area">
          <div class="post_area">
          <!-- <i class="icon_size fas fa-cloud-upload-alt"></i> -->
            <input type="submit" value="ファイルをアップロードする">  
            <input type="file" name="upload_file" @change="change">  
          </div>

        </div>
    
    </form>
    </div>
</div>




<script src="./js/main.js"></script>
</body>

