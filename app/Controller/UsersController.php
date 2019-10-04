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
	public $components = array('Paginator', 'Flash');
	public $uses = array('User', 'Role');
	public $paginate = array(
		'User',
		array(
			'page' => self::DEFALUT_PAGE,
			'fields' => array('User.id', 'User.role_id', 'User.created', 'User.modified',),
			'limit' => self::DEFALUT_PER_PAGE,
			'order' => array(
				'Post.title' => 'asc'
			)	
		),
    );
/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		if ($this->request->is('post')) {
			if (is_null($id)) {
				$this->add();
			}
			$this->edit($id);
		} elseif ($this->request->is('delete')) {
			$this->delete($id);
		} elseif ($this->request->is('get')) {
			$this->search();
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
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
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
		$this->request->allowMethod('post', 'delete');
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
		$paginate =array(
			'User',
			array(
				'page' => $page,
				'fields' => array('User.id', 'User.role_id', 'User.created', 'User.modified',),
				'limit' => $per_page,
				'conditions' => array(
					'User.id' => $user_id,
					'User.user_name' => $user_name,
					'User.role_id' => $role_id,
				),
				'order' => array(
					'User.user_id' => 'asc',
				)
			)
		);
		$this->paginate = $paginate;
		$this->set('result', $this->Paginator->paginate());
		$this->render('index');
	}
}
