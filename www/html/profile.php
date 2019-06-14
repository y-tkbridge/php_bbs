<?php
    require './header.php';
    // $userModel = new Bbs\Model\User();
    // $profileUser = $userModel->find($_SESSION['me']['id']);
    // var_dump($profileUser);
    $postApp = new Bbs\Model\Postpage();
    $postAll = $postApp->getPost($_SESSION['me']->id);

?>
<link href="./css/prifile.css">
<!------ Include the above in your HEAD tag ---------->
<div class="container main-secction">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 image-section">
            <img src="./img/hero.jpg">
        </div>
        <div class="row user-left-part">
            <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                <div class="row ">
                    <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                        <img src="./img/myprofile.png" class="rounded-circle">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                        <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-success btn-block follow">Profile Edit</button> 
                        <!-- <button class="btn btn-warning btn-block">Descargar Curriculum</button>                                -->
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section" style="width:900px;">
                <div class="row profile-right-section-row">
                    <div class="col-md-12 profile-header">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                <h1><?= $_SESSION['me']->username; ?></h1>
                                
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                <!-- <a href="/search" class="btn btn-primary btn-block"></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <p> よろしくおねがいします。 <p>
                                
                            </div>
                            <div class="col-md-4 img-main-rightPart">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row image-right-part">
                                            <div class="col-md-6 pull-left image-right-detail">
                                                <!-- <h6>PUBLICIDAD</h6> -->
                                            </div>
                                        </div>
                                    </div>
                                    <a href="http://camaradecomerciozn.com/">
                                        <div class="col-md-12 image-right">
                                            <!-- サブアイコン -->
                                            <img src="">
                                        </div>
                                    </a>
                                    <div class="col-md-12 image-right-detail-section2">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div> 

<div class="content_container row card">
  <?php foreach($postAll as $post) { ?>
    <?php if($post->user_id === $_SESSION['me']->id){?>
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
  <?php }?>
</div>

<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contact">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="container">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td colspan="1">
                                <form class="well form-horizontal">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="username">User Name</label>
                                            <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="userName" placeholder="user Name" class="form-control" required="true" value="<?= $_SESSION['me']->username; ?>" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="email" name="email" placeholder="E-mail" class="form-control" required="true" value="<?= $_SESSION['me']->email; ?>" type="text"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Password</label>
                                            <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="password" name="password" placeholder="Password" class="form-control" required="true" value="" type="password"></div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Confirm Password</label>
                                            <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="password" name="password_conf" placeholder="Password conf" class="form-control" required="true" value="" type="password"></div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <input type="submit" value="確定">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require './footer.php'?>
