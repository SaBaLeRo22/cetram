<?php
App::uses('Parametro', 'Model');

/**
 * Parametro Test Case
 *
 */
class ParametroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.parametro',
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
		'app.indicadore',
		'app.alerta',
		'app.evento',
		'app.respuesta_indicadore',
		'app.pregunta',
		'app.multiplicadore',
		'app.matrix',
		'app.opcione',
		'app.respuesta_pregunta',
		'app.intervencione',
		'app.item',
		'app.tipo',
		'app.participacione',
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
		$this->Parametro = ClassRegistry::init('Parametro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Parametro);

		parent::tearDown();
	}

}
