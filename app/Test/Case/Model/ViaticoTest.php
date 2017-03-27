<?php
App::uses('Viatico', 'Model');

/**
 * Viatico Test Case
 *
 */
class ViaticoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.viatico',
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
		'app.salario',
		'app.categoria',
		'app.dieta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Viatico = ClassRegistry::init('Viatico');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Viatico);

		parent::tearDown();
	}

}
