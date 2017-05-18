<?php
App::uses('RespuestaTipo', 'Model');

/**
 * RespuestaTipo Test Case
 *
 */
class RespuestaTipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.respuesta_tipo',
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
		'app.coeficiente',
		'app.intervencione',
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
		'app.respuesta_parametro'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RespuestaTipo = ClassRegistry::init('RespuestaTipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RespuestaTipo);

		parent::tearDown();
	}

}
