<?php
App::uses('Coeficiente', 'Model');

/**
 * Coeficiente Test Case
 *
 */
class CoeficienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.matrix'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Coeficiente = ClassRegistry::init('Coeficiente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Coeficiente);

		parent::tearDown();
	}

}
