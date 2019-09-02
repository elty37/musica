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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'WorkFlowDetailComment' => array(
			'className' => 'WorkFlowDetailComment',
			'foreignKey' => 'work_flow_detail_comment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'WorkFlowDetail' => array(
			'className' => 'WorkFlowDetail',
			'foreignKey' => 'work_flow_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'WorkFlowDetailComment' => array(
			'className' => 'WorkFlowDetailComment',
			'foreignKey' => 'work_flow_detail_comment_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
