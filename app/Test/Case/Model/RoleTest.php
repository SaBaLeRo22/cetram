<?php
App::uses('Role', 'Model');

/**
 * Role Test Case
 *
 */
class RoleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.role',
		'app.submodulo',
		'app.casino',
		'app.estado',
		'app.ambiente',
		'app.asignacione',
		'app.usuario',
		'app.rol',
		'app.area',
		'app.gerencia',
		'app.modulo',
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
		$this->Role = ClassRegistry::init('Role');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Role);

		parent::tearDown();
	}

}
