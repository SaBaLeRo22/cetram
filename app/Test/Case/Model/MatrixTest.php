<?php
App::uses('Matrix', 'Model');

/**
 * Matrix Test Case
 *
 */
class MatrixTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.matrix',
		'app.coeficiente',
		'app.ambito',
		'app.estado',
		'app.categoria',
		'app.salario',
		'app.convenio',
		'app.viatico',
		'app.dieta',
		'app.factore',
		'app.item',
		'app.tipo',
		'app.parametro',
		'app.unidade',
		'app.participacione',
		'app.localidade',
		'app.provincia',
		'app.sectore',
		'app.intervencione',
		'app.multiplicadore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Matrix = ClassRegistry::init('Matrix');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Matrix);

		parent::tearDown();
	}

}
