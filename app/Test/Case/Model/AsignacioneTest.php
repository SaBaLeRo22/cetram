<?php
App::uses('Asignacione', 'Model');

/**
 * Asignacione Test Case
 *
 */
class AsignacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.asignacione',
		'app.usuario',
		'app.casino',
		'app.estado',
		'app.ambiente',
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
		$this->Asignacione = ClassRegistry::init('Asignacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Asignacione);

		parent::tearDown();
	}

}
