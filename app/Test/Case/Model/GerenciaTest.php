<?php
App::uses('Gerencia', 'Model');

/**
 * Gerencia Test Case
 *
 */
class GerenciaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gerencia',
		'app.estado',
		'app.ambiente',
		'app.asignacione',
		'app.usuario',
		'app.rol',
		'app.area',
		'app.casino',
		'app.role',
		'app.modulo',
		'app.puesto',
		'app.submodulo',
		'app.tipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Gerencia = ClassRegistry::init('Gerencia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gerencia);

		parent::tearDown();
	}

}
