<?php
App::uses('Multiplicadore', 'Model');

/**
 * Multiplicadore Test Case
 *
 */
class MultiplicadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.multiplicadore',
		'app.estado',
		'app.ambito',
		'app.parametro',
		'app.unidade',
		'app.tipo',
		'app.item',
		'app.participacione',
		'app.categoria',
		'app.salario',
		'app.convenio',
		'app.viatico',
		'app.dieta',
		'app.factore',
		'app.localidade',
		'app.provincia',
		'app.sectore',
		'app.matrix',
		'app.coeficiente',
		'app.intervencione',
		'app.pregunta',
		'app.agrupamiento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Multiplicadore = ClassRegistry::init('Multiplicadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Multiplicadore);

		parent::tearDown();
	}

}
