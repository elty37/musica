<?php
App::uses('AppModel', 'Model');
/**
 * WorkFlowDetailComment Model
 *
 * @property WorkFlowDetailComment $WorkFlowDetailComment
 * @property WorkFlowDetail $WorkFlowDetail
 * @property WorkFlowDetailComment $WorkFlowDetailComment
 */
class WorkFlowDetailComment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'work_flow_detail_comment_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => '[グループID]整数を入力してください。',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'role_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => '[グループID]整数を入力してください。',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed


	/**
	 * タスクIDで取得
	 */
	public function findByDetailIds($detailIds = array()) {
		return $this->find('all', array(
			'fields' => 'User.user_name, Role.role_name, WorkFlowDetailComment.id, WorkFlowDetailComment.work_flow_detail_id, WorkFlowDetailComment.comment, WorkFlowDetailComment.created, WorkFlowDetailComment.modified',
			'joins' => array(
				array(
					'table' => 'users',
					'alias' => 'User',
					'type' => 'LEFT',
					'conditions' => array(
						'User.id = user_id',
					),
				),
				array(
					'table' => 'roles',
					'alias' => 'Role',
					'type' => 'LEFT',
					'conditions' => array(
						'Role.id = WorkFlowDetailComment.role_id',
					),
				),
			),
			'conditions' => array(
				'work_flow_detail_id' => $detailIds,
			),
		));
	}
}
