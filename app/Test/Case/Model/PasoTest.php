<?php
App::uses('Paso', 'Model');

/**
 * Paso Test Case
 *
 */
class PasoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.paso',
		'app.consulta',
		'app.unidade',
		'app.estado',
		'app.agrupamiento',
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
		'app.respuesta_indicadore',
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
		$this->Paso = ClassRegistry::init('Paso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Paso);

		parent::tearDown();
	}

}
