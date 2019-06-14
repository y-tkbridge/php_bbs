<?php

namespace Bbs\Model;

class Postpage extends \Bbs\Model {
  // すべてのポストを取得する
  public function getPostAll(){
    $stmt = $this->db->query("SELECT * FROM (story_user_post_image INNER JOIN `story_user_post` ON story_user_post.post_id = story_user_post_image.post_id ) INNER JOIN users on story_user_post.user_id = users.id ORDER BY story_user_post.post_id DESC");
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
  }

  // 投稿を取得する
  public function getPost($user_id){
    $stmt = $this->db->prepare("SELECT * FROM `story_user_post` INNER JOIN `story_user_post_image` ON story_user_post.post_id = story_user_post_image.post_id"); /*  WHERE story_user_post.user_id = :user_id ");*/
    $stmt->bindValue(":user_id",$user_id);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
  }

  //TODO 投稿処理
  public function createPost($values) {
    /* 投稿データ処理
        'title' => $_POST['title'],
        'comment' => $_POST['comment'],
        'user_id' => $_SESSION['me']->id,
        'content' => $_POST['content'],
    */

    try {
      // トランザクションを開始する
      $this->db->beginTransaction();
      // スレッドテーブルへ書き込み
      $sql = "INSERT INTO story_user_post (user_id,title,comment,del_flag,created,modified) VALUES (:user_id,:title,:comment,0,now(),now())";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue('user_id',$values['user_id']);
      $stmt->bindValue('title',$values['title']);
      $stmt->bindValue('comment',$values['comment']);
      //TODO 削除フラグ追加
      // $stmt->bindValue('del_flag',$values['del_flag']);

      $res = $stmt->execute();
      // story_user_post の直前のカラムを参照?
      $post_id = $this->db->lastInsertId();
      // コメントテーブルへの書き込み
      $sql = "INSERT INTO story_user_post_image (post_id,user_id,image_path,created,modified) VALUES (:post_id,:user_id,:image_path,now(),now())";
      $stmt = $this->db->prepare($sql);
      $stmt->bindValue('post_id',$post_id);
      $stmt->bindValue('user_id',$values['user_id']);
      $stmt->bindValue('image_path',$values['image_path']);
      $res = $stmt->execute();
      // トランザクション処理を完了する
      $this->db->commit();
    } catch (\Exception $e) {
      echo $e->getMessage();
      // エラーがあったら元に戻す
      $this->db->rollBack();
    }
  }

}
