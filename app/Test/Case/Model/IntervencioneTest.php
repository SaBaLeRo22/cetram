<?php
App::uses('Intervencione', 'Model');

/**
 * Intervencione Test Case
 *
 */
class IntervencioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.intervencione',
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
		'app.matrix',
		'app.multiplicadore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Intervencione = ClassRegistry::init('Intervencione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Intervencione);

		parent::tearDown();
	}

}
