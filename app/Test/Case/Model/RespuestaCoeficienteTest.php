<?php
App::uses('RespuestaCoeficiente', 'Model');

/**
 * RespuestaCoeficiente Test Case
 *
 */
class RespuestaCoeficienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.respuesta_coeficiente',
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
		'app.respuesta_indicadore',
		'app.indicadore',
		'app.respuesta_item',
		'app.respuesta_multiplicadore',
		'app.multiplicadore',
		'app.matrix',
		'app.coeficiente',
		'app.intervencione',
		'app.pregunta',
		'app.agrupamiento',
		'app.opcione',
		'app.respuesta_pregunta',
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
		$this->RespuestaCoeficiente = ClassRegistry::init('RespuestaCoeficiente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RespuestaCoeficiente);

		parent::tearDown();
	}

}
