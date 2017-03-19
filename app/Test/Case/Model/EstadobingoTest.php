<?php
App::uses('Estadobingo', 'Model');

/**
 * Estadobingo Test Case
 *
 */
class EstadobingoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estadobingo',
		'app.cajabingo',
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
		$this->Estadobingo = ClassRegistry::init('Estadobingo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estadobingo);

		parent::tearDown();
	}

}
