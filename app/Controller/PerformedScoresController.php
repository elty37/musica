<?php
App::uses('AppController', 'Controller');
/**
 * PerformedScores Controller
 *
 * @property PerformedScore $PerformedScore
 * @property PaginatorComponent $Paginator
 */
class PerformedScoresController extends AppController {

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
		$this->PerformedScore->recursive = 0;
		$this->set('performedScores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PerformedScore->exists($id)) {
			throw new NotFoundException(__('Invalid performed score'));
		}
		$options = array('conditions' => array('PerformedScore.' . $this->PerformedScore->primaryKey => $id));
		$this->set('performedScore', $this->PerformedScore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PerformedScore->create();
			if ($this->PerformedScore->save($this->request->data)) {
				$this->Flash->success(__('The performed score has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The performed score could not be saved. Please, try again.'));
			}
		}
		$performedScores = $this->PerformedScore->PerformedScore->find('list');
		$concerts = $this->PerformedScore->Concert->find('list');
		$scores = $this->PerformedScore->Score->find('list');
		$this->set(compact('performedScores', 'concerts', 'scores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PerformedScore->exists($id)) {
			throw new NotFoundException(__('Invalid performed score'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PerformedScore->save($this->request->data)) {
				$this->Flash->success(__('The performed score has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The performed score could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PerformedScore.' . $this->PerformedScore->primaryKey => $id));
			$this->request->data = $this->PerformedScore->find('first', $options);
		}
		$performedScores = $this->PerformedScore->PerformedScore->find('list');
		$concerts = $this->PerformedScore->Concert->find('list');
		$scores = $this->PerformedScore->Score->find('list');
		$this->set(compact('performedScores', 'concerts', 'scores'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->PerformedScore->exists($id)) {
			throw new NotFoundException(__('Invalid performed score'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PerformedScore->delete($id)) {
			$this->Flash->success(__('The performed score has been deleted.'));
		} else {
			$this->Flash->error(__('The performed score could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
