<?php
App::uses('AppController', 'Controller');
/**
 * Concerts Controller
 *
 * @property Concert $Concert
 * @property PaginatorComponent $Paginator
 */
class ConcertsController extends AppController {

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
		$this->Concert->recursive = 0;
		$this->set('concerts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Concert->exists($id)) {
			throw new NotFoundException(__('Invalid concert'));
		}
		$options = array('conditions' => array('Concert.' . $this->Concert->primaryKey => $id));
		$this->set('concert', $this->Concert->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Concert->create();
			if ($this->Concert->save($this->request->data)) {
				$this->Flash->success(__('The concert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The concert could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Concert->exists($id)) {
			throw new NotFoundException(__('Invalid concert'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Concert->save($this->request->data)) {
				$this->Flash->success(__('The concert has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The concert could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Concert.' . $this->Concert->primaryKey => $id));
			$this->request->data = $this->Concert->find('first', $options);
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
		if (!$this->Concert->exists($id)) {
			throw new NotFoundException(__('Invalid concert'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Concert->delete($id)) {
			$this->Flash->success(__('The concert has been deleted.'));
		} else {
			$this->Flash->error(__('The concert could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
