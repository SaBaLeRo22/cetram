<?php
App::uses('Factore', 'Model');

/**
 * Factore Test Case
 *
 */
class FactoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.factore',
		'app.estado',
		'app.ambito',
		'app.parametro',
		'app.unidade',
		'app.tipo',
		'app.participacione',
		'app.item',
		'app.categoria',
		'app.salario',
		'app.convenio',
		'app.viatico',
		'app.dieta',
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
		$this->Factore = ClassRegistry::init('Factore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Factore);

		parent::tearDown();
	}

}
