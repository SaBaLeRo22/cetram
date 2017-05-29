<?php
App::uses('Consulta', 'Model');

/**
 * Consulta Test Case
 *
 */
class ConsultaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.consulta',
		'app.unidade',
		'app.estado',
		'app.ambito',
		'app.parametro',
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
		'app.indicadore',
		'app.opcione',
		'app.pregunta',
		'app.multiplicadore',
		'app.matrix',
		'app.coeficiente',
		'app.intervencione',
		'app.agrupamiento',
		'app.respuesta_pregunta',
		'app.respuesta_coeficiente',
		'app.respuesta_indicadore',
		'app.respuesta_item',
		'app.respuesta_parametro',
		'app.respuesta_tipo',
		'app.respuesta_multiplicadore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Consulta = ClassRegistry::init('Consulta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Consulta);

		parent::tearDown();
	}

}
