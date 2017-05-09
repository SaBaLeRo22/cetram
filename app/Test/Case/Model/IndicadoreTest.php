<?php
App::uses('Indicadore', 'Model');

/**
 * Indicadore Test Case
 *
 */
class IndicadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.indicadore',
		'app.unidade',
		'app.estado',
		'app.ambito',
		'app.parametro',
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
		'app.sectore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Indicadore = ClassRegistry::init('Indicadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Indicadore);

		parent::tearDown();
	}

}
