<?php
App::uses('AppModel', 'Model');
/**
 * WorkFlowHead Model
 *
 * @property WorkFlowHead $WorkFlowHead
 * @property WorkFlowFile $WorkFlowFile
 * @property WorkFlowDetail $WorkFlowDetail
 * @property WorkFlowHead $WorkFlowHead
 */
class WorkFlowHead extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'work_flow_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'work_flow_file_id' => array(
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
		'WorkFlowHead' => array(
			'className' => 'WorkFlowHead',
			'foreignKey' => 'work_flow_head_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'WorkFlowFile' => array(
			'className' => 'WorkFlowFile',
			'foreignKey' => 'work_flow_file_id',
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
		'WorkFlowDetail' => array(
			'className' => 'WorkFlowDetail',
			'foreignKey' => 'work_flow_head_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'WorkFlowHead' => array(
			'className' => 'WorkFlowHead',
			'foreignKey' => 'work_flow_head_id',
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
