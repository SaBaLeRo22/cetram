<?php
App::uses('Pregunta', 'Model');

/**
 * Pregunta Test Case
 *
 */
class PreguntaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pregunta',
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
		'app.agrupamiento',
		'app.opcione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pregunta = ClassRegistry::init('Pregunta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pregunta);

		parent::tearDown();
	}

}
