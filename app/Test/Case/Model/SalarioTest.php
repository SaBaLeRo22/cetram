<?php
App::uses('Salario', 'Model');

/**
 * Salario Test Case
 *
 */
class SalarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.salario',
		'app.convenio',
		'app.estado',
		'app.ambito',
		'app.parametro',
		'app.unidade',
		'app.tipo',
		'app.participacione',
		'app.item',
		'app.localidade',
		'app.provincia',
		'app.sectore',
		'app.viatico',
		'app.categoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Salario = ClassRegistry::init('Salario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Salario);

		parent::tearDown();
	}

}
