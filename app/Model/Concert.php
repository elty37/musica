<?php
App::uses('AppModel', 'Model');
/**
 * Concert Model
 *
 */
class Concert extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'concert_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'concert_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'editable_division' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
