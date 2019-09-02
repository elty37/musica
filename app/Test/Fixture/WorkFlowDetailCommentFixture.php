<?php
/**
 * WorkFlowDetailComment Fixture
 */
class WorkFlowDetailCommentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'work_flow_detail_comment_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'work_flow_detail_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'comment' => 'ワークフロー明細ID（タスクID）'),
		'comment' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1023, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'work_flow_detail_comment_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB', 'comment' => 'ワークフローのタスクにつくコメント')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'work_flow_detail_comment_id' => 1,
			'work_flow_detail_id' => 1,
			'comment' => 'Lorem ipsum dolor sit amet',
			'created' => '2019-09-02 19:09:42',
			'modified' => '2019-09-02 19:09:42'
		),
	);

}
