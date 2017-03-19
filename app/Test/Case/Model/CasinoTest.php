<?php
App::uses('Casino', 'Model');

/**
 * Casino Test Case
 *
 */
class CasinoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.casino',
		'app.estado',
		'app.role',
		'app.usuario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Casino = ClassRegistry::init('Casino');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Casino);

		parent::tearDown();
	}

}
