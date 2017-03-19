<?php
App::uses('Usuario', 'Model');

/**
 * Usuario Test Case
 *
 */
class UsuarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.usuario',
		'app.casino',
		'app.estado',
		'app.ambiente',
		'app.asignacione',
		'app.rol',
		'app.area',
		'app.gerencia',
		'app.modulo',
		'app.submodulo',
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
		$this->Usuario = ClassRegistry::init('Usuario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Usuario);

		parent::tearDown();
	}

}
