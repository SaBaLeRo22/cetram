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
		'app.agrupamiento',
		'app.ambito',
		'app.parametro',
		'app.unidade',
		'app.consulta',
		'app.modo',
		'app.respuesta_coeficiente',
		'app.coeficiente',
		'app.intervencione',
		'app.item',
		'app.tipo',
		'app.participacione',
		'app.matrix',
		'app.respuesta_indicadore',
		'app.indicadore',
		'app.respuesta_item',
		'app.respuesta_multiplicadore',
		'app.respuesta_parametro',
		'app.respuesta_pregunta',
		'app.opcione',
		'app.respuesta_tipo',
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
