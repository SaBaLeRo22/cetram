<?php
App::uses('Cajabingo', 'Model');

/**
 * Cajabingo Test Case
 *
 */
class CajabingoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cajabingo',
		'app.estadobingo',
		'app.informe',
		'app.auth',
		'app.mesa',
		'app.estadomesa',
		'app.cajamesa',
		'app.tipomesa',
		'app.tipomesapim',
		'app.tipomesaafip',
		'app.resultado',
		'app.estadoinforme',
		'app.errore',
		'app.erroresformato',
		'app.partida'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cajabingo = ClassRegistry::init('Cajabingo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cajabingo);

		parent::tearDown();
	}

}
