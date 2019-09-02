<?php
App::uses('OperationLog', 'Model');

/**
 * OperationLog Test Case
 */
class OperationLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.operation_log'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OperationLog = ClassRegistry::init('OperationLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OperationLog);

		parent::tearDown();
	}

}
