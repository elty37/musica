<?php
App::uses('AppModel', 'Model');
/**
 * PerformedScore Model
 *
 * @property PerformedScore $PerformedScore
 * @property Concert $Concert
 * @property Score $Score
 * @property PerformedScore $PerformedScore
 */
class PerformedScore extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'comment_use_flag' => array(
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
		'PerformedScore' => array(
			'className' => 'PerformedScore',
			'foreignKey' => 'performed_score_id',
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
		'PerformedScore' => array(
			'className' => 'PerformedScore',
			'foreignKey' => 'performed_score_id',
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
