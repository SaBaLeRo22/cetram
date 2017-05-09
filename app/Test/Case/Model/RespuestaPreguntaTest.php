<?php
App::uses('RespuestaPregunta', 'Model');

/**
 * RespuestaPregunta Test Case
 *
 */
class RespuestaPreguntaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.respuesta_pregunta',
		'app.consulta',
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
		'app.respuesta_coeficiente',
		'app.respuesta_indicadore',
		'app.respuesta_item',
		'app.respuesta_multiplicadore',
		'app.multiplicadore',
		'app.matrix',
		'app.coeficiente',
		'app.intervencione',
		'app.pregunta',
		'app.agrupamiento',
		'app.respuesta_parametro',
		'app.respuesta_tipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RespuestaPregunta = ClassRegistry::init('RespuestaPregunta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RespuestaPregunta);

		parent::tearDown();
	}

}
