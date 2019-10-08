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
public $helpers = array('Session');
public $uses = array('WorkFlowHead', 'WorkFlowDetail', 'WorkFlowDetailComment','Role', 'WorkFlowFile');

/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		if ($this->request->is('post')) {
			if (is_null($id)) {
				$this->add();
				return;
			}
			$this->edit($id);
			return;
		} elseif ($this->request->is('delete')) {
			$this->delete($id);
			return;
		} elseif ($this->request->is('get')) {
			$this->search();
			return;
		}
		$this->search();
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
			$workFlowHead = $this->request->data["WorkFlowHead"];
			$requestWorkFlowDetails = $this->request->data["WorkFlowDetail"];
			$workFlowDetail = array();
			$workFlowHead = $this->WorkFlowHead->save($this->request->data["WorkFlowHead"]);
			if (!$workFlowHead) {
				$this->Flash->error(__('The work flow head could not be saved. Please, try again.'));
			}
			foreach($requestWorkFlowDetails as $workFlowDetail) {
				$workFlowDetail["work_flow_head_id"] = $workFlowHead["WorkFlowHead"]["id"];
				App::uses('WorkFlowDetail', 'Model');
				$workFlowDetail["task_state"] = WorkFlowDetail::WORK_FLOW_STATE_YET;
				$workFlowDetails[] = $workFlowDetail;
			}
			if (!$this->WorkFlowDetail->saveAll($workFlowDetails)) {
				$this->Flash->error(__('The work flow head could not be saved. Please, try again.'));
			}

			$this->Flash->success(__('The work flow head has been saved.'));
			return $this->redirect(array('action' => 'index'));

		}
		$workFlowHeads = $this->WorkFlowHead->find('list');
		$workFlowFiles = $this->WorkFlowHead->find('list');
		$roleList = $this->Role->find('all', array(
			'fields' => array('id', 'role_name',),
		));
		$this->setJsonResponce($roleList, 'roleList');

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
		$this->request->allowMethod('post', 'delete', 'get');
		if ($this->WorkFlowHead->delete($id)) {
			$this->Flash->success(__('The work flow head has been deleted.'));
		} else {
			$this->Flash->error(__('The work flow head could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	/**
	 * ワークフロー一覧取得Ajax
	 * @param int $per_page 1ページのデータ数
	 * @param int $page 何ページ目か
 	 */
	  public function search() {
		$page = Hash::get($this->request->query, "page", self::DEFALUT_PAGE);
		$per_page = Hash::get($this->request->query, "per_page", self::DEFALUT_PER_PAGE);
		$workFlowHeadId = Hash::get($this->request->query, "work_flow_head_id");
		$workFlowName = Hash::get($this->request->query, "work_flow_name");
		//$fileName = Hash::get($this->request->query, "file_id");
		$conditions = array(
			'WorkFlowHead.id' => $workFlowHeadId,
			'WorkFlowHead.work_flow_name' => $workFlowName,
		//	'work_flow_heads.file_name' => $fileName,
		);

		if (is_null($workFlowHeadId) && is_null($workFlowName)) {
			$conditions = array();
		}
		$paginate =	array(
			'page' => $page,
			'fields' => array('id', 'work_flow_name', 'file_name', 'created', 'modified',),
			'limit' => $per_page,
			'conditions' => array(
				'or' => $conditions,
			),
			'order' => array(
				'WorkFlowHead.id' => 'asc',
			)
		);
		$this->Paginator->settings = $paginate;
		$workFlowHeads = $this->Paginator->paginate();
		$workFlowHeadids = array();
		for ($i = 0; $i < count($workFlowHeads); $i++) {
			$workFlowHeadids[] = $workFlowHeads[$i]["WorkFlowHead"]["id"];
			$workFlowHeads[$i]["WorkFlowHead"]["url"] = '/work_flow_heads/view/' . $workFlowHeads[$i]["WorkFlowHead"]["id"];
		}
		
		$this->setJsonResponce($workFlowHeads);
		//ファイルアップロード
		$this->set('stateList', array(
			'0' => '未着手',
			'1' => '作業中',
			'2' => '作業完了',
		));
		$this->render('index');

	}

	/**
	 * excelアップロード
	 */
	public function upload() {
		$id = Hash::get($this->request->data, "id");
		$roleId = $this->Session->read('Auth.User.role_id');
		if (!$this->WorkFlowHead->exists($id)) {
			throw new NotFoundException(__('Invalid work flow head'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$taskState = Hash::get($this->request->data, "task_state");
			$fileName = Hash::get($this->request->params["form"]["workFile"], "name");
			move_uploaded_file($this->request->params['form']['workFile']['tmp_name'], "../webroot/files/". $fileName);
			$targetWorkFlowDetails = $this->WorkFlowDetail->findByHeadIdAndRoleId($id, $roleId);
			foreach($targetWorkFlowDetails as $index => $targetWorkFlowDetail) {
				if (!is_null($taskState)) {
					$targetWorkFlowDetails[$index]["WorkFlowDetail"]["task_state"] = $taskState;
				}
			}
			if (!$this->WorkFlowDetail->saveAll($targetWorkFlowDetails)) {
				$this->Flash->error(__('The work flow detail could not be saved. Please, try again.'));
				return $this->redirect(array('action' => 'index'));
			}
			$workFlowFile = $this->WorkFlowFile->save(array('work_flow_file_name' => $fileName));
			if (!$workFlowFile) {
				$this->Flash->error(__('The work flow file could not be saved. Please, try again.'));
				return $this->redirect(array('action' => 'index'));
			}
			if ($this->WorkFlowHead->save(array('id' => $id, 'file_name' => $fileName, 'work_flow_file_id' => $workFlowFile["WorkFlowFile"]["id"]))) {
				$this->Flash->success(__('The work flow head has been saved.'));
			} else {
				$this->Flash->error(__('The work flow head could not be saved. Please, try again.'));
			}
		}
		return $this->redirect(array('action' => 'index'));
	}
	/**
	 * viewの表示情報生成
	 * @param array $head
	 * @param array $details
	 * @param array $comments
	 * @return array 
	 */
	private function createViewData($head, $details, $comments){
		$viewData = $head["WorkFlowHead"];
		$viewData["workflowDetails"] = array();

		foreach ($details as $detail) {
			$detail = $this->convertFromTaskStateToColor($detail);
			$detail["WorkFlowDetail"]["comments"] = array();
			foreach ($comments as $comment) {
				$comment["WorkFlowDetailComment"]["user_name"] = $comment["User"]["user_name"];
				$comment["WorkFlowDetailComment"]["role_name"] = $comment["Role"]["role_name"];
				if ($comment["WorkFlowDetailComment"]["work_flow_detail_id"] == $detail["WorkFlowDetail"]["id"]) {
					$detail["WorkFlowDetail"]["comments"][] = $comment["WorkFlowDetailComment"];
				}
			}
			$viewData["workflowDetails"][] = $detail["WorkFlowDetail"];
		}

		return $viewData;
	}

	/**
	 * タスクの色を設定
	 * @param array $detail
	 * @return array
	 */
	private function convertFromTaskStateToColor($detail) {
		$finish_color = '#c0ff23';
		$current_color = '#ffc023';
		$yet_color = '#cfcfcf';
		$finish = '完了';
		$current = '作業中';
		$yet = '未着手';
		if ($detail["WorkFlowDetail"]["task_state"] == self::TASK_STATE_FINISH) {
			$detail["WorkFlowDetail"]["task_state_cokor"] = $finish_color;
			$detail["WorkFlowDetail"]["task_state"] = $finish;
		} elseif ($detail["WorkFlowDetail"]["task_state"] == self::TASK_STATE_CURRENT) {
			$detail["WorkFlowDetail"]["task_state_color"] = $current_color;
			$detail["WorkFlowDetail"]["task_state"] = $current;
		} else {
			$detail["WorkFlowDetail"]["task_state_color"] = $yet_color;
			$detail["WorkFlowDetail"]["task_state"] = $yet;
		}
		return $detail;
	}
}
