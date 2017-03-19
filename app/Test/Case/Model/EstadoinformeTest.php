<?php
App::uses('Estadoinforme', 'Model');

/**
 * Estadoinforme Test Case
 *
 */
class EstadoinformeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estadoinforme',
		'app.informe',
		'app.auth',
		'app.mesa',
		'app.estadomesa',
		'app.cajamesa',
		'app.tipomesa',
		'app.tipomesapim',
		'app.tipomesaafip',
		'app.cajabingo',
		'app.estadobingo',
		'app.partida',
		'app.resultado',
		'app.errore',
		'app.erroresformato'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Estadoinforme = ClassRegistry::init('Estadoinforme');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estadoinforme);

		parent::tearDown();
	}

}
