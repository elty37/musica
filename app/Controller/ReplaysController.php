<?php
App::uses('AppController', 'Controller');
/**
 * Replays Controller
 *
 * @property Replay $Replay
 * @property PaginatorComponent $Paginator
 */
class ReplaysController extends AppController {

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
		$this->Replay->recursive = 0;
		$this->set('replays', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Replay->exists($id)) {
			throw new NotFoundException(__('Invalid replay'));
		}
		$options = array('conditions' => array('Replay.' . $this->Replay->primaryKey => $id));
		$this->set('replay', $this->Replay->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Replay->create();
			if ($this->Replay->save($this->request->data)) {
				$this->Flash->success(__('The replay has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The replay could not be saved. Please, try again.'));
			}
		}
		$replays = $this->Replay->Replay->find('list');
		$scores = $this->Replay->Score->find('list');
		$this->set(compact('replays', 'scores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Replay->exists($id)) {
			throw new NotFoundException(__('Invalid replay'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Replay->save($this->request->data)) {
				$this->Flash->success(__('The replay has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The replay could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Replay.' . $this->Replay->primaryKey => $id));
			$this->request->data = $this->Replay->find('first', $options);
		}
		$replays = $this->Replay->Replay->find('list');
		$scores = $this->Replay->Score->find('list');
		$this->set(compact('replays', 'scores'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Replay->exists($id)) {
			throw new NotFoundException(__('Invalid replay'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Replay->delete($id)) {
			$this->Flash->success(__('The replay has been deleted.'));
		} else {
			$this->Flash->error(__('The replay could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
