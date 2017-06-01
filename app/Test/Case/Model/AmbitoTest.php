<?php
App::uses('Ambito', 'Model');

/**
 * Ambito Test Case
 *
 */
class AmbitoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ambito',
		'app.estado',
		'app.agrupamiento',
		'app.pregunta',
		'app.multiplicadore',
		'app.matrix',
		'app.coeficiente',
		'app.intervencione',
		'app.item',
		'app.unidade',
		'app.consulta',
		'app.modo',
		'app.respuesta_coeficiente',
		'app.respuesta_indicadore',
		'app.indicadore',
		'app.respuesta_item',
		'app.respuesta_multiplicadore',
		'app.respuesta_parametro',
		'app.parametro',
		'app.tipo',
		'app.participacione',
		'app.respuesta_pregunta',
		'app.opcione',
		'app.respuesta_tipo',
		'app.categoria',
		'app.salario',
		'app.convenio',
		'app.viatico',
		'app.dieta',
		'app.factore',
		'app.localidade',
		'app.provincia',
		'app.sectore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ambito = ClassRegistry::init('Ambito');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ambito);

		parent::tearDown();
	}

}
