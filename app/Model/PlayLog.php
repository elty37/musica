<?php
App::uses('AppModel', 'Model');
/**
 * PlayLog Model
 *
 * @property PlayLog $PlayLog
 * @property User $User
 * @property Replay $Replay
 */
class PlayLog extends AppModel {

	/**
	 * @var string $primaryKey
	 */
	public $primaryKey = 'play_log_id';

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
		'action_type' => array(
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
		'Replay' => array(
			'className' => 'Replay',
			'foreignKey' => 'replay_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
