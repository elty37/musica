<?php
/**
 * WorkFlowFile Fixture
 */
class WorkFlowFileFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'work_flow_files_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'work_flow_file_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'work_flow_files_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB', 'comment' => 'ワークフローのファイル')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'work_flow_files_id' => 1,
			'work_flow_file_name' => 'Lorem ipsum dolor sit amet',
			'created' => '2019-09-02 19:10:40',
			'modified' => '2019-09-02 19:10:40'
		),
	);

}
