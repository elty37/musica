<?php
App::uses('AppModel', 'Model');
/**
 * WorkFlowFile Model
 *
 * @property WorkFlowFiles $WorkFlowFiles
 * @property WorkFlowHead $WorkFlowHead
 */
class WorkFlowFile extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'work_flow_files_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'work_flow_file_name' => array(
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

	// The Associations below have been created with all possible keys, those that are not needed can be removed


}
