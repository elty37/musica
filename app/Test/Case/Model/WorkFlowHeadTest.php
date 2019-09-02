<?php
App::uses('WorkFlowHead', 'Model');

/**
 * WorkFlowHead Test Case
 */
class WorkFlowHeadTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.work_flow_head',
		'app.work_flow_file',
		'app.work_flow_files',
		'app.work_flow_detail',
		'app.work_flow_detail_comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkFlowHead = ClassRegistry::init('WorkFlowHead');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkFlowHead);

		parent::tearDown();
	}

}
