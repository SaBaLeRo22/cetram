<?php
App::uses('Submodulo', 'Model');

/**
 * Submodulo Test Case
 *
 */
class SubmoduloTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.submodulo',
		'app.modulo',
		'app.estado',
		'app.ambiente',
		'app.asignacione',
		'app.usuario',
		'app.rol',
		'app.area',
		'app.gerencia',
		'app.casino',
		'app.role',
		'app.puesto',
		'app.tipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Submodulo = ClassRegistry::init('Submodulo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Submodulo);

		parent::tearDown();
	}

}
