<?php

/* app/View/JsonMultiByteView.php */

App::uses('JsonView', 'View');

// JsonViewを継承
class JsonMultiByteView extends JsonView {

  // オーバーライド
  protected function _serialize($serialize) {

    //既存処理（エスケープされる）
    $json = parent::_serialize($serialize);

    // エスケープをデコード
    return unicode_encode($json);
  }
}