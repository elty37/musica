<?php
App::uses('AppModel', 'Model');
/**
 * WorkFlowDetail Model
 *
 * @property WorkFlowDetail $WorkFlowDetail
 * @property WorkFlowHead $WorkFlowHead
 * @property WorkFlowDetailComment $WorkFlowDetailComment
 * @property WorkFlowDetail $WorkFlowDetail
 */
class WorkFlowDetail extends AppModel {
	const WORK_FLOW_STATE_YET = '0'; //未着手
	const WORK_FLOW_STATE_CURRENT = '1'; //現在作業中
	const WORK_FLOW_STATE_FINISHED = '2'; // 作業完了
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'work_flow_detail_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'work_flow_head_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'task_state' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public function findByHeadId($headId) {
		return $this->find('all',array(
			'conditions' => array(
				'work_flow_head_id' => $headId,
			),
		));
	}

	public function findByHeadIdAndRoleId($headId, $roleId) {
		return $this->find('all',array(
			'conditions' => array(
				'work_flow_head_id' => $headId,
				'role_id' => $roleId,
			),
		));
	}
}
