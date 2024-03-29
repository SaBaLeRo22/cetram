<?php
App::uses('Modo', 'Model');

/**
 * Modo Test Case
 *
 */
class ModoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.modo',
		'app.estado',
		'app.ambito',
		'app.parametro',
		'app.unidade',
		'app.consulta',
		'app.respuesta_coeficiente',
		'app.coeficiente',
		'app.intervencione',
		'app.item',
		'app.tipo',
		'app.participacione',
		'app.matrix',
		'app.multiplicadore',
		'app.pregunta',
		'app.agrupamiento',
		'app.opcione',
		'app.respuesta_pregunta',
		'app.respuesta_indicadore',
		'app.indicadore',
		'app.respuesta_item',
		'app.respuesta_multiplicadore',
		'app.respuesta_parametro',
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
		$this->Modo = ClassRegistry::init('Modo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Modo);

		parent::tearDown();
	}

}
