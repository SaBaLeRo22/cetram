<?php
App::uses('Tipomesapim', 'Model');

/**
 * Tipomesapim Test Case
 *
 */
class TipomesapimTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipomesapim',
		'app.tipomesa',
		'app.tipomesaafip',
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
		'app.erroresformato'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipomesapim = ClassRegistry::init('Tipomesapim');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipomesapim);

		parent::tearDown();
	}

}
