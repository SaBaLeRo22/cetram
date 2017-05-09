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
		'app.respuesta_pregunta',
		'app.respuesta_tipo'
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
