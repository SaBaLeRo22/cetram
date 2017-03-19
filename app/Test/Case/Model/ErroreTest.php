<?php
App::uses('Errore', 'Model');

/**
 * Errore Test Case
 *
 */
class ErroreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.errore',
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
		'app.estadoinforme',
		'app.erroresformato'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Errore = ClassRegistry::init('Errore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Errore);

		parent::tearDown();
	}

}
