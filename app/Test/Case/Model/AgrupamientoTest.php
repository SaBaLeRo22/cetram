<?php
App::uses('Agrupamiento', 'Model');

/**
 * Agrupamiento Test Case
 *
 */
class AgrupamientoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.agrupamiento',
		'app.estado',
		'app.ambito',
		'app.coeficiente',
		'app.intervencione',
		'app.item',
		'app.unidade',
		'app.consulta',
		'app.localidade',
		'app.provincia',
		'app.modo',
		'app.respuesta_coeficiente',
		'app.respuesta_indicadore',
		'app.indicadore',
		'app.respuesta_item',
		'app.respuesta_multiplicadore',
		'app.multiplicadore',
		'app.matrix',
		'app.pregunta',
		'app.opcione',
		'app.respuesta_pregunta',
		'app.respuesta_parametro',
		'app.parametro',
		'app.tipo',
		'app.participacione',
		'app.respuesta_tipo',
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
		$this->Agrupamiento = ClassRegistry::init('Agrupamiento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Agrupamiento);

		parent::tearDown();
	}

}
