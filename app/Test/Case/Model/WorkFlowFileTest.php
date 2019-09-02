<?php
App::uses('WorkFlowFile', 'Model');

/**
 * WorkFlowFile Test Case
 */
class WorkFlowFileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.work_flow_file',
		'app.work_flow_files',
		'app.work_flow_head'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkFlowFile = ClassRegistry::init('WorkFlowFile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkFlowFile);

		parent::tearDown();
	}

}
