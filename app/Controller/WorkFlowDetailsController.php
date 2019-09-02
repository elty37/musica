<?php
App::uses('AppController', 'Controller');
/**
 * WorkFlowDetails Controller
 *
 * @property WorkFlowDetail $WorkFlowDetail
 * @property PaginatorComponent $Paginator
 */
class WorkFlowDetailsController extends AppController {

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
		$this->WorkFlowDetail->recursive = 0;
		$this->set('workFlowDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkFlowDetail->exists($id)) {
			throw new NotFoundException(__('Invalid work flow detail'));
		}
		$options = array('conditions' => array('WorkFlowDetail.' . $this->WorkFlowDetail->primaryKey => $id));
		$this->set('workFlowDetail', $this->WorkFlowDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkFlowDetail->create();
			if ($this->WorkFlowDetail->save($this->request->data)) {
				$this->Flash->success(__('The work flow detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The work flow detail could not be saved. Please, try again.'));
			}
		}
		$workFlowDetails = $this->WorkFlowDetail->WorkFlowDetail->find('list');
		$workFlowHeads = $this->WorkFlowDetail->WorkFlowHead->find('list');
		$this->set(compact('workFlowDetails', 'workFlowHeads'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WorkFlowDetail->exists($id)) {
			throw new NotFoundException(__('Invalid work flow detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WorkFlowDetail->save($this->request->data)) {
				$this->Flash->success(__('The work flow detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The work flow detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WorkFlowDetail.' . $this->WorkFlowDetail->primaryKey => $id));
			$this->request->data = $this->WorkFlowDetail->find('first', $options);
		}
		$workFlowDetails = $this->WorkFlowDetail->WorkFlowDetail->find('list');
		$workFlowHeads = $this->WorkFlowDetail->WorkFlowHead->find('list');
		$this->set(compact('workFlowDetails', 'workFlowHeads'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->WorkFlowDetail->exists($id)) {
			throw new NotFoundException(__('Invalid work flow detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->WorkFlowDetail->delete($id)) {
			$this->Flash->success(__('The work flow detail has been deleted.'));
		} else {
			$this->Flash->error(__('The work flow detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
