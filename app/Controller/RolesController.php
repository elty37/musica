<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 * @property PaginatorComponent $Paginator
 */
class RolesController extends AppController {

	const ADMIN_ID = 1;
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

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
		if (!$this->Role->exists($id)) {
			$this->Flash->error("そのIDは存在しません。");
			return $this->redirect(array('action' => 'index'));
		}
		$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
		$this->set('role', $this->Role->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Role->create();
			if ($this->Role->save($this->request->data)) {
				$this->Flash->success(__('The role has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The role could not be saved. Please, try again.'));
			}
		}
		$roles = $this->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Role->exists($id)) {
			$this->Flash->error("そのIDは存在しません。");
			return $this->redirect(array('action' => 'index'));
		}
		if ($id == self::ADMIN_ID) {
			$this->Flash->error("そのIDは編集できません。");
			return $this->redirect(array('action' => 'index'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Role->save($this->request->data)) {
				$this->Flash->success(__('The role has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The role could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
			$this->request->data = $this->Role->find('first', $options);
		}
		$roles = $this->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Role->exists($id)) {
			$this->Flash->error("そのIDは存在しません。");
			return $this->redirect(array('action' => 'index'));
		}
		if ($id == self::ADMIN_ID) {
			$this->Flash->error("そのIDは削除できません。");
			return $this->redirect(array('action' => 'index'));
		}
		$this->request->allowMethod('post', 'delete', 'get');
		if ($this->Role->delete($id)) {
			$this->Flash->success(__('The role has been deleted.'));
		} else {
			$this->Flash->error(__('The role could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

		/**
	 * Role一覧取得Ajax
	 * @param int $per_page 1ページのデータ数
	 * @param int $page 何ページ目か
 	 */
	  public function search() {
		$page = Hash::get($this->request->query, "page", self::DEFALUT_PAGE);
		$per_page = Hash::get($this->request->query, "per_page", self::DEFALUT_PER_PAGE);
		$roleId = Hash::get($this->request->query, "role_id");
		$roleName = Hash::get($this->request->query, "role_name");
		$adminFlag = Hash::get($this->request->query, "admin_flag");
		$conditions = array(
			'Role.id' => $roleId,
			'Role.role_name' => $roleName,
			'Role.admin_flag' => $adminFlag,
		);

		if (is_null($roleId) && is_null($roleName) && is_null($adminFlag)) {
			$conditions = array();
		}
		$paginate =	array(
			'page' => $page,
			'fields' => array('id', 'role_name', 'admin_flag', 'created', 'modified',),
			'limit' => $per_page,
			'conditions' => array(
				'or' => $conditions,
			),
			'order' => array(
				'Role.id' => 'asc',
			)
		);
		$this->Paginator->settings = $paginate;
		$this->setJsonResponce($this->Paginator->paginate());
		$this->render('index');

	}
}
