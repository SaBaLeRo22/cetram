<?php
App::uses('Indicadore', 'Model');

/**
 * Indicadore Test Case
 *
 */
class IndicadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.indicadore',
		'app.unidade',
		'app.estado',
		'app.agrupamiento',
		'app.paso',
		'app.consulta',
		'app.localidade',
		'app.provincia',
		'app.modo',
		'app.respuesta_coeficiente',
		'app.coeficiente',
		'app.ambito',
		'app.parametro',
		'app.tipo',
		'app.item',
		'app.participacione',
		'app.pregunta',
		'app.multiplicadore',
		'app.matrix',
		'app.opcione',
		'app.respuesta_pregunta',
		'app.intervencione',
		'app.respuesta_indicadore',
		'app.respuesta_item',
		'app.respuesta_multiplicadore',
		'app.respuesta_parametro',
		'app.respuesta_pasajero',
		'app.respuesta_salario',
		'app.convenio',
		'app.salario',
		'app.categoria',
		'app.viatico',
		'app.dieta',
		'app.respuesta_tipo',
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
		$this->Indicadore = ClassRegistry::init('Indicadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Indicadore);

		parent::tearDown();
	}

}
