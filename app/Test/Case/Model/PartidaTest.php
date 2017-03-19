<?php
App::uses('Partida', 'Model');

/**
 * Partida Test Case
 *
 */
class PartidaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.partida',
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
		'app.erroresformato'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Partida = ClassRegistry::init('Partida');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Partida);

		parent::tearDown();
	}

}
