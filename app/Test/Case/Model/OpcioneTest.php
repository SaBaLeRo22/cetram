<?php
App::uses('Opcione', 'Model');

/**
 * Opcione Test Case
 *
 */
class OpcioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.opcione',
		'app.pregunta',
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
		'app.agrupamiento',
		'app.respuesta_pregunta',
		'app.consulta',
		'app.respuesta_coeficiente',
		'app.respuesta_indicadore',
		'app.indicadore',
		'app.respuesta_item',
		'app.respuesta_multiplicadore',
		'app.respuesta_parametro',
		'app.respuesta_tipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Opcione = ClassRegistry::init('Opcione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Opcione);

		parent::tearDown();
	}

}
