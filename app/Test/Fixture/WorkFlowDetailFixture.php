<?php
/**
 * WorkFlowDetail Fixture
 */
class WorkFlowDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'work_flow_detail_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'work_flow_head_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => 'ヘッダID'),
		'task_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'タスク名', 'charset' => 'utf8'),
		'task_state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'comment' => 'タスクの状態', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'work_flow_detail_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB', 'comment' => 'ワークフロー明細')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'work_flow_detail_id' => 1,
			'work_flow_head_id' => 1,
			'task_name' => 'Lorem ipsum dolor sit amet',
			'task_state' => 'Lorem ipsum dolor sit ame',
			'created' => '2019-09-02 19:10:11',
			'modified' => '2019-09-02 19:10:11'
		),
	);

}
