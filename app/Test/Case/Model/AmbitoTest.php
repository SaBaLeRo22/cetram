<?php
App::uses('Ambito', 'Model');

/**
 * Ambito Test Case
 *
 */
class AmbitoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ambito',
		'app.estado',
		'app.item',
		'app.tipo',
		'app.parametro',
		'app.unidade',
		'app.localidade',
		'app.provincia',
		'app.sectore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ambito = ClassRegistry::init('Ambito');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ambito);

		parent::tearDown();
	}

}
