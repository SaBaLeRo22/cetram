<?php
App::uses('Estadomesa', 'Model');

/**
 * Estadomesa Test Case
 *
 */
class EstadomesaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estadomesa',
		'app.mesa',
		'app.cajamesa',
		'app.tipomesa',
		'app.tipomesapim',
		'app.tipomesaafip',
		'app.informe',
		'app.auth',
		'app.cajabingo',
		'app.estadobingo',
		'app.partida',
		'app.resultado',
		'app.estadoinforme',
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
		$this->Estadomesa = ClassRegistry::init('Estadomesa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estadomesa);

		parent::tearDown();
	}

}
