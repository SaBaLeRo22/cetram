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
		'app.paso',
		'app.consulta',
		'app.unidade',
		'app.indicadore',
		'app.ambito',
		'app.coeficiente',
		'app.intervencione',
		'app.item',
		'app.tipo',
		'app.parametro',
		'app.participacione',
		'app.matrix',
		'app.alerta',
		'app.evento',
		'app.respuesta_indicadore',
		'app.opcione',
		'app.respuesta_pregunta',
		'app.respuesta_coeficiente',
		'app.respuesta_item',
		'app.respuesta_parametro',
		'app.respuesta_tipo',
		'app.localidade',
		'app.provincia',
		'app.modo',
		'app.respuesta_multiplicadore',
		'app.respuesta_pasajero',
		'app.respuesta_salario',
		'app.convenio',
		'app.salario',
		'app.categoria',
		'app.viatico',
		'app.dieta',
		'app.factore',
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
