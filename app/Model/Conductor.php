<?php
App::uses('AppModel', 'Model');
/**
 * Conductor Model
 *
 * @property Conductor $Conductor
 * @property User $User
 * @property Concert $Concert
 */
class Conductor extends AppModel {


	/**
	 * @var string $primaryKey
	 */
	public $primaryKey = 'user_id';

	/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'concert_id' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Concert' => array(
			'className' => 'Concert',
			'foreignKey' => 'concert_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
