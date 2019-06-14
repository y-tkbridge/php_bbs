<?php

namespace Bbs\Exception;

class EmptyImage extends \Exception {
  protected $message = 'ファイルが選択されていません';
}
