<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
  const LIMIT = 500;
  const DEFALUT_PER_PAGE = 50;
  const DEFALUT_PAGE = 1;
  private $from_page = false;
	public $components = array(
        'DebugKit.Toolbar',
    );
        
    public function beforeFilter()
    {
      $page_token = Hash::get($this->request->query, "token", null);
      $session_token = CakeSession::read('token');
      if ($page_token == $session_token) {
        //トークンが一致すればページからの呼び出しと判断
          $this->from_page = true;
          return;
      }
      // 以下、API呼び出し時の認証処理
    }
    /**
     * api呼び出しかページ呼び出しかをトークンで判定。
     */
    public function beforeRender() {
        if (!$this->from_page) {
          // JsonViewとJsonMultiByteViewを差し替え
          $this->viewClass = 'JsonMultiByte';
          $this->set('_serialize', 'result');
        }
    }
}
