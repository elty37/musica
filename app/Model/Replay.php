<?php
App::uses('AppModel', 'Model');
/**
 * Replay Model
 *
 * @property Replay $Replay
 * @property Score $Score
 * @property PlayLog $PlayLog
 * @property Replay $Replay
 */
class Replay extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'score_id' => array(
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
		'Replay' => array(
			'className' => 'Replay',
			'foreignKey' => 'replay_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Score' => array(
			'className' => 'Score',
			'foreignKey' => 'score_id',
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
		'PlayLog' => array(
			'className' => 'PlayLog',
			'foreignKey' => 'replay_id',
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
		'Replay' => array(
			'className' => 'Replay',
			'foreignKey' => 'replay_id',
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
