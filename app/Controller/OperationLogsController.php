<?php
App::uses('AppController', 'Controller');
/**
 * OperationLogs Controller
 *
 * @property OperationLog $OperationLog
 * @property PaginatorComponent $Paginator
 */
class OperationLogsController extends AppController {

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
	public function index() {
		$this->OperationLog->recursive = 0;
		$this->set('operationLogs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OperationLog->exists($id)) {
			throw new NotFoundException(__('Invalid operation log'));
		}
		$options = array('conditions' => array('OperationLog.' . $this->OperationLog->primaryKey => $id));
		$this->set('operationLog', $this->OperationLog->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OperationLog->create();
			if ($this->OperationLog->save($this->request->data)) {
				$this->Flash->success(__('The operation log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The operation log could not be saved. Please, try again.'));
			}
		}
		$operationLogs = $this->OperationLog->OperationLog->find('list');
		$this->set(compact('operationLogs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OperationLog->exists($id)) {
			throw new NotFoundException(__('Invalid operation log'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OperationLog->save($this->request->data)) {
				$this->Flash->success(__('The operation log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The operation log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OperationLog.' . $this->OperationLog->primaryKey => $id));
			$this->request->data = $this->OperationLog->find('first', $options);
		}
		$operationLogs = $this->OperationLog->OperationLog->find('list');
		$this->set(compact('operationLogs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->OperationLog->exists($id)) {
			throw new NotFoundException(__('Invalid operation log'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OperationLog->delete($id)) {
			$this->Flash->success(__('The operation log has been deleted.'));
		} else {
			$this->Flash->error(__('The operation log could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
