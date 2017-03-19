<?php
App::uses('Topomesaafip', 'Model');

/**
 * Topomesaafip Test Case
 *
 */
class TopomesaafipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.topomesaafip'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Topomesaafip = ClassRegistry::init('Topomesaafip');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Topomesaafip);

		parent::tearDown();
	}

}
