<?php
App::uses('AppModel', 'Model');
/**
 * OperationLog Model
 *
 * @property OperationLog $OperationLog
 * @property OperationLog $OperationLog
 */
class OperationLog extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'operation_log_id' => array(
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
		'OperationLog' => array(
			'className' => 'OperationLog',
			'foreignKey' => 'operation_log_id',
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
		'OperationLog' => array(
			'className' => 'OperationLog',
			'foreignKey' => 'operation_log_id',
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
