<?php
App::uses('WorkFlowDetail', 'Model');

/**
 * WorkFlowDetail Test Case
 */
class WorkFlowDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.work_flow_detail',
		'app.work_flow_head',
		'app.work_flow_detail_comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkFlowDetail = ClassRegistry::init('WorkFlowDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkFlowDetail);

		parent::tearDown();
	}

}
