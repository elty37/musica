<?php
/**
 * OperationLog Fixture
 */
class OperationLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'operation_log_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'function_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'params' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1023, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'comment' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1023, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_user' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'operation_log_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB', 'comment' => '操作ログ')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'operation_log_id' => 1,
			'function_name' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'comment' => 'Lorem ipsum dolor sit amet',
			'created' => '2019-09-02 19:01:19',
			'created_user' => 'Lorem ipsum dolor sit amet',
			'modified' => '2019-09-02 19:01:19',
			'modified_user' => 'Lorem ipsum dolor sit amet'
		),
	);

}
