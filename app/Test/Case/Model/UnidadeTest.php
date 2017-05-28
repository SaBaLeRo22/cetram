<?php
App::uses('Unidade', 'Model');

/**
 * Unidade Test Case
 *
 */
class UnidadeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.consulta',
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
		$this->Unidade = ClassRegistry::init('Unidade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Unidade);

		parent::tearDown();
	}

}
