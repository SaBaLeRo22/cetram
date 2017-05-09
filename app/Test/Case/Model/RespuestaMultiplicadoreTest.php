<?php
App::uses('RespuestaMultiplicadore', 'Model');

/**
 * RespuestaMultiplicadore Test Case
 *
 */
class RespuestaMultiplicadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.respuesta_multiplicadore',
		'app.consulta',
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
		'app.pregunta',
		'app.agrupamiento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RespuestaMultiplicadore = ClassRegistry::init('RespuestaMultiplicadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RespuestaMultiplicadore);

		parent::tearDown();
	}

}
