<?php

namespace Bbs\Controller;

class Postpage extends \Bbs\Controller
{
    public function run()
    {
        $messages = array();
        if (!empty($_FILES)) {
           $this->get_imgfile($file);
        } else {
            return $messages = array('error' => 'file empty');
        }
    }

    public function get_filetype(){
        $file = $_FILES['upload_file'];
        $tmp_name = $file['tmp_name']; // 一時ファイルのパス
        $tmp_size = getimagesize($tmp_name); // 一時ファイルの情報を取得
        $file_info = pathinfo($_FILES['upload_file']['name']);
        $extension = strtolower($file_info['extension']);
        return $extension;
        
    }

    public function get_imgfile(){
        $extension = $this->get_filetype();
        $uploaddir = '/var/www/html/img/';
        $save_stamp = date('YmdHis');
        $uploadfile = $uploaddir . $save_stamp . basename($_FILES['upload_file']['name']);
        if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadfile)) {
            echo "<b>Upload success.</b>";
        } else {
            echo "<b>Upload failed.</b>";
        }   
    }

    public function createPost()
    {
        $postModel = new \Bbs\Model\Postimage();
        $postModel->createComment([
          'thread_id' => $_POST['thread_id'],
          'user_id' => $_SESSION['me']->id,
          'content' => $_POST['content'],
        ]);
    }
}

// $limit_image_size = 10; //最大サイズ・メガバイト
// $base_image_name = ''; //重複しない名前を生成

// //同一名のファイルが存在していない確認
// $file_check = glob(IMAGE_DIR.$base_image_name.'.*');
// if ($file_check === false) {
//     exit('ファイルチェックシステムエラー');
// }
// if (!empty($file_check)) {//配列が空か確認
//     //同一のファイルパスが存在していた場合の処理
//     $base_image_name = ''; //重複しない名前を生成
// }

// try {//例外が発生する可能性がある処理
//     //セキュリティー・改竄フォーム対策
//     if (!isset($_FILES['upfile']['error']) || !is_int($_FILES['upfile']['error'])) {
//         throw new RuntimeException('パラメータが不正です');
//     }
//     // $_FILES['upfile']['error'] の値を確認
//     switch ($_FILES['upfile']['error']) {
//         case UPLOAD_ERR_OK: // OK
//             break;
//         case UPLOAD_ERR_NO_FILE:   // ファイル未選択
//             throw new RuntimeException('ファイルが選択されていません');
//         case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過 (upload_max_filesize)
//         case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過 (フォームは改竄される可能性があるため、別途チェック必要)
//             throw new RuntimeException('ファイルサイズが大きすぎます');
//         default:
//             throw new RuntimeException('その他のエラーが発生しました');
//     }
//     //サイズチェック
//     if ($_FILES['upfile']['size'] > ($limit_image_size * 1024 * 1024)) {
//         throw new RuntimeException('ファイルのサイズが大きすぎます。ファイルの容量は'.$limit_image_size.'Mまでです。');
//     }
//     //拡張子の取得
//     //拡張子の種類の配列は、時間がある時に再考が必要。
//     if (!$ext = array_search(
//         mime_content_type($_FILES['upfile']['tmp_name']),
//         array(
//             'gif' => 'image/gif',
//             'jpg' => 'image/jpeg', //通常はjpgはこれ。
//             'png' => 'image/png',
//             'tiff' => 'image/tiff',
//             'pdf' => 'application/pdf',
//         ),
//         true
//     )) {
//         throw new RuntimeException('ファイルの形式エラーです。');
//     }
//     //ファイル名を作成
//     $new_image_name = $base_image_name.'.'.$ext;
// } catch (RuntimeException $e) {//例外が発生した場合の処理
//     exit($e->getMessage());
// }
