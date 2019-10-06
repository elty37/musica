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
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed


	/**
	 * タスクIDで取得
	 */
	public function findByDetailIds($detailIds = array()) {
		return $this->find('all', array(
			'conditions' => array(
				'work_flow_detail_id' => $detailIds,
			),
		));
	}
}
