<?php
App::uses('Convenio', 'Model');

/**
 * Convenio Test Case
 *
 */
class ConvenioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.convenio',
		'app.estado',
		'app.agrupamiento',
		'app.pregunta',
		'app.multiplicadore',
		'app.matrix',
		'app.coeficiente',
		'app.ambito',
		'app.indicadore',
		'app.unidade',
		'app.consulta',
		'app.modo',
		'app.respuesta_coeficiente',
		'app.respuesta_indicadore',
		'app.respuesta_item',
		'app.item',
		'app.tipo',
		'app.parametro',
		'app.participacione',
		'app.respuesta_multiplicadore',
		'app.respuesta_parametro',
		'app.respuesta_pregunta',
		'app.opcione',
		'app.respuesta_tipo',
		'app.intervencione',
		'app.categoria',
		'app.salario',
		'app.dieta',
		'app.viatico',
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
		$this->Convenio = ClassRegistry::init('Convenio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Convenio);

		parent::tearDown();
	}

}
