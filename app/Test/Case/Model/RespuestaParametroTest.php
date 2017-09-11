<?php
App::uses('RespuestaParametro', 'Model');

/**
 * RespuestaParametro Test Case
 *
 */
class RespuestaParametroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.respuesta_parametro',
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
		'app.alerta',
		'app.evento',
		'app.respuesta_indicadore',
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
		$this->RespuestaParametro = ClassRegistry::init('RespuestaParametro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RespuestaParametro);

		parent::tearDown();
	}

}
