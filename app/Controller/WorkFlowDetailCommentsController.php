<?php
App::uses('AppController', 'Controller');
/**
 * WorkFlowDetailComments Controller
 *
 * @property WorkFlowDetailComment $WorkFlowDetailComment
 * @property PaginatorComponent $Paginator
 */
class WorkFlowDetailCommentsController extends AppController {

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
		$this->WorkFlowDetailComment->recursive = 0;
		$this->set('workFlowDetailComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkFlowDetailComment->exists($id)) {
			throw new NotFoundException(__('Invalid work flow detail comment'));
		}
		$options = array('conditions' => array('WorkFlowDetailComment.' . $this->WorkFlowDetailComment->primaryKey => $id));
		$this->set('workFlowDetailComment', $this->WorkFlowDetailComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkFlowDetailComment->create();
			if ($this->WorkFlowDetailComment->save($this->request->data)) {
				$this->Flash->success(__('The work flow detail comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The work flow detail comment could not be saved. Please, try again.'));
			}
		}
		$workFlowDetailComments = $this->WorkFlowDetailComment->WorkFlowDetailComment->find('list');
		$workFlowDetails = $this->WorkFlowDetailComment->WorkFlowDetail->find('list');
		$this->set(compact('workFlowDetailComments', 'workFlowDetails'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WorkFlowDetailComment->exists($id)) {
			throw new NotFoundException(__('Invalid work flow detail comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WorkFlowDetailComment->save($this->request->data)) {
				$this->Flash->success(__('The work flow detail comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The work flow detail comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WorkFlowDetailComment.' . $this->WorkFlowDetailComment->primaryKey => $id));
			$this->request->data = $this->WorkFlowDetailComment->find('first', $options);
		}
		$workFlowDetailComments = $this->WorkFlowDetailComment->WorkFlowDetailComment->find('list');
		$workFlowDetails = $this->WorkFlowDetailComment->WorkFlowDetail->find('list');
		$this->set(compact('workFlowDetailComments', 'workFlowDetails'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->WorkFlowDetailComment->exists($id)) {
			throw new NotFoundException(__('Invalid work flow detail comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->WorkFlowDetailComment->delete($id)) {
			$this->Flash->success(__('The work flow detail comment has been deleted.'));
		} else {
			$this->Flash->error(__('The work flow detail comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
