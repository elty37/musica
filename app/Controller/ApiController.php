<?php
/* app/Controller/ApiController.php */

App::uses('AppController', 'Controller');

class ApiController extends AppController {

  // コンポーネントを追加
  public $components = array('RequestHandler');
  // JsonViewとJsonMultiByteViewを差し替え
  public function beforeRender() {
    if ($this->viewClass === 'Json') {
      $this->viewClass = 'JsonMultiByte';
    }
  }
  // アクションの出力を日本語に変更
  public function sample() {
    $this->set('result', true);
    $this->set('message', 'これはサンプルです'); // 英語→日本語に変更
    $this->set('_serialize', array('result', 'message'));
  }
}