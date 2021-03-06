<?php
App::uses('RespuestaIndicadore', 'Model');

/**
 * RespuestaIndicadore Test Case
 *
 */
class RespuestaIndicadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.respuesta_indicadore',
		'app.consulta',
		'app.unidade',
		'app.estado',
		'app.agrupamiento',
		'app.paso',
		'app.pregunta',
		'app.multiplicadore',
		'app.matrix',
		'app.coeficiente',
		'app.ambito',
		'app.indicadore',
		'app.parametro',
		'app.tipo',
		'app.item',
		'app.participacione',
		'app.intervencione',
		'app.opcione',
		'app.respuesta_pregunta',
		'app.categoria',
		'app.salario',
		'app.convenio',
		'app.respuesta_salario',
		'app.viatico',
		'app.dieta',
		'app.factore',
		'app.localidade',
		'app.provincia',
		'app.modo',
		'app.respuesta_coeficiente',
		'app.respuesta_item',
		'app.respuesta_multiplicadore',
		'app.respuesta_parametro',
		'app.respuesta_pasajero',
		'app.respuesta_tipo',
		'app.sectore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RespuestaIndicadore = ClassRegistry::init('RespuestaIndicadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RespuestaIndicadore);

		parent::tearDown();
	}

}
