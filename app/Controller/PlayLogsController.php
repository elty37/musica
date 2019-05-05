<?php
App::uses('AppController', 'Controller');
/**
 * PlayLogs Controller
 *
 * @property PlayLog $PlayLog
 * @property PaginatorComponent $Paginator
 */
class PlayLogsController extends AppController {

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
		$this->PlayLog->recursive = 0;
		$this->set('playLogs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlayLog->exists($id)) {
			throw new NotFoundException(__('Invalid play log'));
		}
		$options = array('conditions' => array('PlayLog.' . $this->PlayLog->primaryKey => $id));
		$this->set('playLog', $this->PlayLog->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlayLog->create();
			if ($this->PlayLog->save($this->request->data)) {
				$this->Flash->success(__('The play log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The play log could not be saved. Please, try again.'));
			}
		}
		$playLogs = $this->PlayLog->find('list');
		$users = $this->PlayLog->User->find('list');
		$replays = $this->PlayLog->Replay->find('list');
		$this->set(compact('playLogs', 'users', 'replays'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PlayLog->exists($id)) {
			throw new NotFoundException(__('Invalid play log'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PlayLog->save($this->request->data)) {
				$this->Flash->success(__('The play log has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The play log could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PlayLog.' . $this->PlayLog->primaryKey => $id));
			$this->request->data = $this->PlayLog->find('first', $options);
		}
		$playLogs = $this->PlayLog->find('list');
		$users = $this->PlayLog->User->find('list');
		$replays = $this->PlayLog->Replay->find('list');
		$this->set(compact('playLogs', 'users', 'replays'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->PlayLog->exists($id)) {
			throw new NotFoundException(__('Invalid play log'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PlayLog->delete($id)) {
			$this->Flash->success(__('The play log has been deleted.'));
		} else {
			$this->Flash->error(__('The play log could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
