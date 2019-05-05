<?php
App::uses('AppController', 'Controller');
/**
 * Conductors Controller
 *
 * @property Conductor $Conductor
 * @property PaginatorComponent $Paginator
 */
class ConductorsController extends AppController {

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
		$this->Conductor->recursive = 0;
		$this->set('conductors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Conductor->exists($id)) {
			throw new NotFoundException(__('Invalid conductor'));
		}
		$options = array('conditions' => array('Conductor.' . $this->Conductor->primaryKey => $id));
		$this->set('conductor', $this->Conductor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Conductor->create();
			if ($this->Conductor->save($this->request->data)) {
				$this->Flash->success(__('The conductor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The conductor could not be saved. Please, try again.'));
			}
		}
		$conductors = $this->Conductor->Conductor->find('list');
		$users = $this->Conductor->User->find('list');
		$concerts = $this->Conductor->Concert->find('list');
		$this->set(compact('conductors', 'users', 'concerts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Conductor->exists($id)) {
			throw new NotFoundException(__('Invalid conductor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conductor->save($this->request->data)) {
				$this->Flash->success(__('The conductor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The conductor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conductor.' . $this->Conductor->primaryKey => $id));
			$this->request->data = $this->Conductor->find('first', $options);
		}
		$conductors = $this->Conductor->Conductor->find('list');
		$users = $this->Conductor->User->find('list');
		$concerts = $this->Conductor->Concert->find('list');
		$this->set(compact('conductors', 'users', 'concerts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Conductor->exists($id)) {
			throw new NotFoundException(__('Invalid conductor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Conductor->delete($id)) {
			$this->Flash->success(__('The conductor has been deleted.'));
		} else {
			$this->Flash->error(__('The conductor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
