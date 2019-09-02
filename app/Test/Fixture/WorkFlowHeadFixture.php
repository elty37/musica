<?php
/**
 * WorkFlowHead Fixture
 */
class WorkFlowHeadFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'work_flow_head_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'work_flow_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'work_flow_file_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => 'ワークフローに紐づいたエクセルのファイルID'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'work_flow_head_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB', 'comment' => 'ワークフローヘッダ情報')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'work_flow_head_id' => 1,
			'work_flow_name' => 'Lorem ipsum dolor sit amet',
			'work_flow_file_id' => 1,
			'modified' => '2019-09-02 19:11:04',
			'created' => '2019-09-02 19:11:04'
		),
	);

}
