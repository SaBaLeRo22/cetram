<?php
App::uses('Afip', 'Model');

/**
 * Afip Test Case
 *
 */
class AfipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.afip'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Afip = ClassRegistry::init('Afip');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Afip);

		parent::tearDown();
	}

}
