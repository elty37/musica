<?php
/**
 * Concert Fixture
 */
class ConcertFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'concert_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'concert_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'editable_division' => array('type' => 'boolean', 'null' => false, 'default' => null, 'comment' => '1 本人以外編集不可
2 特定のユーザのみ編集可能
3 誰でも編集可能'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'concert_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'concert_id' => 1,
			'concert_name' => 'Lorem ipsum dolor sit amet',
			'editable_division' => 1,
			'created' => '2019-05-06 05:47:46',
			'modified' => '2019-05-06 05:47:46'
		),
	);

}
