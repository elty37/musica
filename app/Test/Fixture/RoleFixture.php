<?php
/**
 * Role Fixture
 */
class RoleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'role_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'admin_flag' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'comment' => '管理者フラグ 0:管理者以外 1:管理者', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'role_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB', 'comment' => 'ロール情報')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'role_id' => 1,
			'role_name' => 'Lorem ipsum dolor sit amet',
			'admin_flag' => 'Lorem ipsum dolor sit ame',
			'created' => '2019-09-02 19:01:57',
			'modified' => '2019-09-02 19:01:57'
		),
	);

}
