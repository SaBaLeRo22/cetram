<?php
App::uses('Cajamesa', 'Model');

/**
 * Cajamesa Test Case
 *
 */
class CajamesaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cajamesa',
		'app.mesa',
		'app.estadomesa',
		'app.informe',
		'app.auth',
		'app.cajabingo',
		'app.estadobingo',
		'app.partida',
		'app.resultado',
		'app.estadoinforme',
		'app.errore',
		'app.erroresformato',
		'app.tipomesa',
		'app.tipomesapim',
		'app.tipomesaafip'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cajamesa = ClassRegistry::init('Cajamesa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cajamesa);

		parent::tearDown();
	}

}
