<?php
App::uses('Evento', 'Model');

/**
 * Evento Test Case
 *
 */
class EventoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.evento',
		'app.alerta',
		'app.indicadore',
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
		'app.parametro',
		'app.tipo',
		'app.item',
		'app.participacione',
		'app.pregunta',
		'app.multiplicadore',
		'app.matrix',
		'app.opcione',
		'app.respuesta_pregunta',
		'app.intervencione',
		'app.respuesta_indicadore',
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
		$this->Evento = ClassRegistry::init('Evento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Evento);

		parent::tearDown();
	}

}
