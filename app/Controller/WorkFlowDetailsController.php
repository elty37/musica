<?php
App::uses('AppController', 'Controller');
/**
 * WorkFlowDetails Controller
 *
 * @property WorkFlowDetail $WorkFlowDetail
 * @property WorkFlowHead $WorkFlowHead
 * @property WorkFlowDetailComment $WorkFlowDetailComment
 * @property PaginatorComponent $Paginator
 */
class WorkFlowDetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('WorkFlowDetail', 'WorkFlowHead', 'WorkFlowDetailComment',);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->WorkFlowDetail->recursive = 0;
		$this->view();
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
		$comment_options = array('conditions' => array('WorkFlowDetailComments.work_flow_detail_id' => $id));
		$comments = $this->WorkFlowDetailComment->find('all', $comment_options);
		$options = array('conditions' => array('WorkFlowDetail.' . $this->WorkFlowDetail->primaryKey => $id));
		$this->setJsonResponce($comments, 'comments');
		$this->setJsonResponce($this->WorkFlowDetail->find('first', $options), 'workFlowDetail');
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
		$workFlowDetails = $this->WorkFlowDetail->find('list');
		$this->set(compact('workFlowDetails'));
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
				return $this->redirect(array('controller' => 'WorkFlowHeads', 'action' => 'view', $this->request->data["headId"]));
			} else {
				$this->Flash->error(__('The work flow detail could not be saved. Please, try again.'));
				return $this->redirect(array('controller' => 'WorkFlowHeads', 'action' => 'view', $this->request->data["headId"]));
			}
		} else {
			$options = array('conditions' => array('WorkFlowDetail.' . $this->WorkFlowDetail->primaryKey => $id));
			$this->request->data = $this->WorkFlowDetail->find('first', $options);
		}
		$workFlowDetails = $this->WorkFlowDetail->find('list');
		$this->set(compact('workFlowDetails'));
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
