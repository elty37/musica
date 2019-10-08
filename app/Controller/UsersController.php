<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $uses = array('User', 'Role');
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
		$this->Auth->allow('login');
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
			throw new NotFoundException(__('Invalid user'));
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
			throw new NotFoundException(__('Invalid user'));
		}
		$password = Hash::get($this->request->query, "password", self::DEFALUT_PAGE);
		$input_user = $this->request->data;
		$input_user["User"]["password"] = AuthComponent::password($password);
		if ($this->request->is(array('post', 'put'))) {
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
			throw new NotFoundException(__('Invalid user'));
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
	 * @param int $per_page 1ページのデータ数
	 * @param int $page 何ページ目か
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
			'fields' => array('id', 'user_name', 'role_id', 'created', 'modified',),
			'limit' => $per_page,
			'conditions' => array(
				'or' => $conditions,
			),
			'order' => array(
				'User.id' => 'asc',
			)
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
}
