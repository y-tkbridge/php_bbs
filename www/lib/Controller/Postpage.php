<?php

namespace Bbs\Controller;

class Postpage extends \Bbs\Controller
{
    // view で最初に読み込まれる
    public function run()
    {
        // POSTメソッドがリクエストされていればpostProcessメソッド実行
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['upload_file']['name'] !== "" ) {
            $this->postProcess();
        } else {
            //TODO POSTメソッドでない場合、何らかのメッセージを表示する
            echo "\<meta http-equiv='refresh' content='0;url=http://localhost:8000/postpage.php'>";
           
        }
    }

    public function getImageType(){
        $file = $_FILES['upload_file'];

        // 一時ファイルのパス
        $tmp_name = $file['tmp_name'];

        // 一時ファイルの情報を取得
        $tmp_size = getimagesize($tmp_name); 

        $file_info = pathinfo($_FILES['upload_file']['name']);
        $extension = strtolower($file_info['extension']);
        return $extension;
    }

    // 画像イメージを指定してディレクトリに保存する
    public function saveImage(){
        $extension = $this->getImageType();
        $uploaddir =  './img/';
        $saveTimeStamp = date('YmdHis');
        $uploadfile = $uploaddir  .$saveTimeStamp. basename($_FILES['upload_file']['name']);
        //DEBUG
        //TODO 保存ディレクトリを取得する

        if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadfile)) {
            return $uploadfile;
        } else {
           //TODO アップロードエラーを表示する
        }   
    }

    protected function postProcess()
    {
        $saveImagePath = $this->saveImage();
        // TODO 投稿の際に必要なバリデーションを行う
        // try {
        //     $this->validate();
        // } catch (\Bbs\Exception\InvalidEmail $e) {
        //     $this->setErrors('email', $e->getMessage());
        // } catch (\Bbs\Exception\InvalidName $e) {
        //     $this->setErrors('username', $e->getMessage());
        // } catch (\Bbs\Exception\InvalidPassword $e) {
        //     $this->setErrors('password', $e->getMessage());
        // }

        //TODO 表画面への処理結果の表示について要検討
        // $this->setValues('email', $_POST['email']);
        // $this->setValues('username', $_POST['username']);

        if ($this->hasError()) {
            return;
        } else {
            // コメント情報を新規登録する
            try {
                $postImageModel = new \Bbs\Model\Postpage();
                $post = $postImageModel->createPost([
                    // 'post_id' => $_POST['post_id'],
                    'title' => $_POST['title'],
                    'comment' => $_POST['comment'],
                    'user_id' => $_SESSION['me']->id,
                    'content' => $_POST['content'],
                    'image_path' => $saveImagePath,
                ]);
            } catch (\Bbs\Exception\DuplicateEmail $e) {
                $this->setErrors('postimage', $e->getMessage());
                return;
            }

            echo "\<meta http-equiv='refresh' content='0;url=http://localhost:8000/'>";
            exit;
        }
    }

    private function validate()
    {
        // トークンが空またはPOST送信とセッションに格納された値が異なるとエラー
        // if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        //   echo "不正なトークンです!";
        //   exit;
        // }
        if ($_FILES['upload_file'] === '') {
            throw new \Bbs\Exception\EmptyImage();
        }
        if ($_POST['username'] === '') {
            throw new \Bbs\Exception\InvalidName();
        }
        if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])) {
            throw new \Bbs\Exception\InvalidPassword();
        }
    }






}
