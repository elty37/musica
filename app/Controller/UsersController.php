<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property Role $Role
 * @property OauthSignup $OauthSignup
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	const ADMIN_ID = 1;

/**
 * Components
 *
 * @var array
 */
	public $uses = array('User', 'Role', 'OauthSignup');
	public $paginate = array(
		'User',
		array(
			'page' => self::DEFALUT_PAGE,
			'fields' => array('User.id', 'User.role_id', 'User.created', 'User.modified',),
			'limit' => self::DEFALUT_PER_PAGE,
			'order' => array(
				'User.id' => 'asc'
			)	
		),
	);
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('login', 'twitterAuth');
	}

/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		if ($this->request->is('post')) {
			if (is_null($id)) {
				$this->add();
				return;
			}
			$this->edit($id);
			return;
		} elseif ($this->request->is('delete')) {
			$this->delete($id);
			return;
		} elseif ($this->request->is('get')) {
			$this->search();
			return;
		}
		$this->search();
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			$this->Flash->error("そのIDは存在しません。");
			return $this->redirect(array('action' => 'index'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		// roleの一覧を取得
		$this->set('roles', $this->Role->find('list', array('fields' => array('Role.id', 'Role.role_name'),)));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) { 
		if (!$this->User->exists($id)) {
			$this->Flash->error("そのIDは存在しません。");
			return $this->redirect(array('action' => 'index'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$password = Hash::get($this->request->data["User"], "password", self::DEFALUT_PAGE);
			$input_user = $this->request->data;
			$blowfishPasswordHasher = new BlowfishPasswordHasher();
			$input_user["User"]["password"] = $blowfishPasswordHasher->hash($password);	
			if ($this->User->save($input_user)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			// roleの一覧を取得
			$this->set('roles', $this->Role->find('list', array('fields' => array('Role.id', 'Role.role_name'),)));
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->User->exists($id)) {
			$this->Flash->error("そのIDは存在しません。");
			return $this->redirect(array('action' => 'index'));
		}
		if ($id == self::ADMIN_ID) {
			$this->Flash->error("そのIDは削除できません。");
			return $this->redirect(array('action' => 'index'));
		}
		$this->request->allowMethod('post', 'delete', 'get');
		if ($this->User->delete($id)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * User一覧取得Ajax
 	 */
	public function search() {
		$page = Hash::get($this->request->query, "page", self::DEFALUT_PAGE);
		$per_page = Hash::get($this->request->query, "per_page", self::DEFALUT_PER_PAGE);
		$user_id = Hash::get($this->request->query, "user_id");
		$user_name = Hash::get($this->request->query, "user_name");
		$role_id = Hash::get($this->request->query, "role_id");
		$conditions = array(
			'User.id' => $user_id,
			'User.user_name' => $user_name,
			'User.role_id' => $role_id,
		);

		if (is_null($user_id) && is_null($user_name) && is_null($role_id)) {
			$conditions = array();
		}
		$paginate =	array(
			'page' => $page,
			'fields' => array('User.id', 'User.user_name', 'User.role_id', 'User.created', 'User.modified', 'Role.role_name'),
			'limit' => $per_page,
			'conditions' => array(
				'or' => $conditions,
			),
			'order' => array(
				'User.id' => 'asc',
			),
			'joins' => array(
				array(
					'table' => 'roles',
					'alias' => 'Role',
					'type' => 'LEFT',
					'conditions' => array(
						'Role.id = User.role_id',
					),
				),
			),
		);
		$this->Paginator->settings = $paginate;
		$this->setJsonResponce($this->Paginator->paginate());
		$this->render('index');

	}
	/**
	 * ログイン(フォーム認証）
	 */
	public function login() {
		$this->layout = "";
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Auth->setToken();
				$login_user = $this->User->find('first', array(
					'conditions' => array(
							'id' => $this->Session->read('Auth.User.id'),
						),
					)
				);
				$login_users_role = $this->Role->find('first', array(
					'conditions' => array(
							'id' => $login_user["User"]["role_id"],
						),
					)
				);
				$this->Session->write('Auth.User.role_name', $login_users_role["Role"]["role_name"]);
				$this->Session->write('Auth.User.admin_flag', $login_users_role["Role"]["admin_flag"]);
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Flash->error(__('Invalid username or password, try again'));
			}
		}
	}
	/**
	 * ログアウト
	 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	/**
	 * Twitter認証
	 * @param int $id ツイッターのuser_id
	 */
	public function twitterAuth($id) {
		$login_user = $this->User->find('first', array(
			'conditions' => array(
					'auth_user_id' => $id,
					'auth_type' => $this->User::AUTH_TYPE_TWITTER,
				),
			)
		);
		if(is_null($login_user) || count($login_user) == 0) {
			$this->Flash->error(__('your twitter account is not authorized.'));
			$this->redirect($this->Auth->logout());
		}

		if ($this->Auth->login($login_user["User"])) {
			$this->Auth->setToken();
			$login_users_role = $this->Role->find('first', array(
				'conditions' => array(
						'id' => $login_user["User"]["role_id"],
					),
				)
			);
			$this->Session->write('Auth.User.role_name', $login_users_role["Role"]["role_name"]);
			$this->Session->write('Auth.User.admin_flag', $login_users_role["Role"]["admin_flag"]);
			$this->redirect($this->Auth->redirect());
		} else {
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}

	/**
	 * ツイッターログインユーザ作成エンドポイント生成
	 * 管理者権限のあるユーザのみ使用可能
	 * エンドポイントの有効期間は10分
	 */
	public function createUserEntryForTwitter() {
		if ($this->request->is('post')) {
			$userName = Hash::get($this->request->data["UserEntryForTwitter"], "user_name", null);
			$mailAddress = Hash::get($this->request->data["UserEntryForTwitter"], "mail_address", null);

			if (is_null($userName)) {
				$this->Flash->error(__('ユーザ名は必須です.'));
				$this->redirect(array('action' => 'userEntryForTwitter'));
			}
			if (is_null($mailAddress)) {
				$this->Flash->error(__('メールアドレスは必須です.'));
				$this->redirect(array('action' => 'userEntryForTwitter'));
			}
			$oneTimePassword = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 36);
			$this->OauthSignup->create();
			$oauthSignup = array(
				"OauthSignup" => array(
					"user_name" => $userName,
					"one_time_password" => $oneTimePassword,
				),
			);
			$this->OauthSignup->save($oauthSignup);
			$Email = new CakeEmail();
			$Email->from(array('lulu@mikazegaoka.com' => '美風ヶ丘高校ワークフロー'));
			$Email->to($mailAddress);
			$Email->subject('ユーザ登録');
			$Email->send('http://localhost/users/userEntryForTwitter/' . $oneTimePassword);
			$this->redirect(array('action' => 'createUserEntryForTwitter'));
		}
	}

	public function userEntryForTwitter() {

	}
}
