<?php
App::uses('WorkFlowDetailComment', 'Model');

/**
 * WorkFlowDetailComment Test Case
 */
class WorkFlowDetailCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.work_flow_detail_comment',
		'app.work_flow_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkFlowDetailComment = ClassRegistry::init('WorkFlowDetailComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkFlowDetailComment);

		parent::tearDown();
	}

}
