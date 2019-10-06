<?php
App::uses('AppController', 'Controller');
/**
 * WorkFlowHeads Controller
 *
 * @property WorkFlowDetail $WorkFlowDetail
 * @property WorkFlowHead $WorkFlowHead
 * @property WorkFlowDetailComment $WorkFlowDetailComment
 * @property PaginatorComponent $Paginator
 */
class WorkFlowHeadsController extends AppController {

	const TASK_STATE_FINISH = '2';
	const TASK_STATE_CURRENT = '1';
	const TASK_STATE_YET = '0';
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('WorkFlowHead', 'WorkFlowDetail', 'WorkFlowDetailComment',);

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
		// head取得
		$options = array('conditions' => array('WorkFlowHead.' . $this->WorkFlowHead->primaryKey => $id));
		$workFlowHead = $this->WorkFlowHead->find('first', $options);
		// detail取得
		$workFlowDetails = $this->WorkFlowDetail->findByHeadId($id);
		$workFlowDetailIds = array();
		
		// detail毎のコメントを取得
		foreach($workFlowDetails as $workFlowDetail) {
			$workFlowDetailIds[] = $workFlowDetail['WorkFlowDetail']["id"];
		}
		$workFlowDetailComments = $this->WorkFlowDetailComment->findByDetailIds($workFlowDetailIds);
		// 合体
		$result = $this->createViewData($workFlowHead, $workFlowDetails, $workFlowDetailComments);
		
		$this->setJsonResponce($result);
		
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

	private function createViewData($head, $details, $comments){
		$viewData = $head["WorkFlowHead"];
		$viewData["workflowDetail"] = array();

		foreach ($details as $detail) {
			$detail = $this->convertFromTaskStateToColor($detail);
			$detail["WorkFlowDetail"]["comments"] = array();
			foreach ($comments as $comment) {
				$detail["WorkFlowDetail"]["comments"][] = $comment["WorkFlowDetailComment"];
			}
			$viewData["workflowDetails"][] = $detail["WorkFlowDetail"];
		}

		return $viewData;
	}

	private function convertFromTaskStateToColor($detail) {
		$finish = '#c0ff23';
		$current = '#ffc023';
		$yet = '#cfcfcf';
		if ($detail["WorkFlowDetail"]["task_state"] == self::TASK_STATE_FINISH) {
			$detail["WorkFlowDetail"]["task_state"] = $finish;
		} elseif ($detail["WorkFlowDetail"]["task_state"] == self::TASK_STATE_CURRENT) {
			$detail["WorkFlowDetail"]["task_state"] = $current;
		} else {
			$detail["WorkFlowDetail"]["task_state"] = $yet;
		}
		return $detail;
	}
}
