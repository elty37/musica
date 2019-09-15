<?php
App::uses('AppController', 'Controller');
/**
 * WorkFlowHeads Controller
 *
 * @property WorkFlowHead $WorkFlowHead
 * @property PaginatorComponent $Paginator
 */
class WorkFlowHeadsController extends AppController {

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
		$this->WorkFlowHead->recursive = 0;
		$this->set('workFlowHeads', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkFlowHead->exists($id)) {
			throw new NotFoundException(__('Invalid work flow head'));
		}
		$options = array('conditions' => array('WorkFlowHead.id' => $id));
		$this->set('workFlowHead', $this->WorkFlowHead->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkFlowHead->create();
			if ($this->WorkFlowHead->save($this->request->data)) {
				$this->Flash->success(__('The work flow head has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The work flow head could not be saved. Please, try again.'));
			}
		}
		$workFlowHeads = $this->WorkFlowHead->WorkFlowHead->find('list');
		$workFlowFiles = $this->WorkFlowHead->WorkFlowFile->find('list');
		$this->set(compact('workFlowHeads', 'workFlowFiles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WorkFlowHead->exists($id)) {
			throw new NotFoundException(__('Invalid work flow head'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WorkFlowHead->save($this->request->data)) {
				$this->Flash->success(__('The work flow head has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The work flow head could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WorkFlowHead.' . $this->WorkFlowHead->primaryKey => $id));
			$this->request->data = $this->WorkFlowHead->find('first', $options);
		}
		$workFlowHeads = $this->WorkFlowHead->WorkFlowHead->find('list');
		$workFlowFiles = $this->WorkFlowHead->WorkFlowFile->find('list');
		$this->set(compact('workFlowHeads', 'workFlowFiles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->WorkFlowHead->exists($id)) {
			throw new NotFoundException(__('Invalid work flow head'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->WorkFlowHead->delete($id)) {
			$this->Flash->success(__('The work flow head has been deleted.'));
		} else {
			$this->Flash->error(__('The work flow head could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
