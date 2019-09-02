<?php
App::uses('AppController', 'Controller');
/**
 * WorkFlowFiles Controller
 *
 * @property WorkFlowFile $WorkFlowFile
 * @property PaginatorComponent $Paginator
 */
class WorkFlowFilesController extends AppController {

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
		$this->WorkFlowFile->recursive = 0;
		$this->set('workFlowFiles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WorkFlowFile->exists($id)) {
			throw new NotFoundException(__('Invalid work flow file'));
		}
		$options = array('conditions' => array('WorkFlowFile.' . $this->WorkFlowFile->primaryKey => $id));
		$this->set('workFlowFile', $this->WorkFlowFile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WorkFlowFile->create();
			if ($this->WorkFlowFile->save($this->request->data)) {
				$this->Flash->success(__('The work flow file has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The work flow file could not be saved. Please, try again.'));
			}
		}
		$workFlowFiles = $this->WorkFlowFile->WorkFlowFile->find('list');
		$this->set(compact('workFlowFiles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WorkFlowFile->exists($id)) {
			throw new NotFoundException(__('Invalid work flow file'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WorkFlowFile->save($this->request->data)) {
				$this->Flash->success(__('The work flow file has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The work flow file could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WorkFlowFile.' . $this->WorkFlowFile->primaryKey => $id));
			$this->request->data = $this->WorkFlowFile->find('first', $options);
		}
		$workFlowFiles = $this->WorkFlowFile->WorkFlowFile->find('list');
		$this->set(compact('workFlowFiles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->WorkFlowFile->exists($id)) {
			throw new NotFoundException(__('Invalid work flow file'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->WorkFlowFile->delete($id)) {
			$this->Flash->success(__('The work flow file has been deleted.'));
		} else {
			$this->Flash->error(__('The work flow file could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
