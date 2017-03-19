<?php
App::uses('Ambiente', 'Model');

/**
 * Ambiente Test Case
 *
 */
class AmbienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ambiente',
		'app.estado',
		'app.asignacione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ambiente = ClassRegistry::init('Ambiente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ambiente);

		parent::tearDown();
	}

}
