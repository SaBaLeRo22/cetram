<?php
App::uses('Tipomesaafip', 'Model');

/**
 * Tipomesaafip Test Case
 *
 */
class TipomesaafipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipomesaafip',
		'app.tipomesa',
		'app.tipomesapim',
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
		$this->Tipomesaafip = ClassRegistry::init('Tipomesaafip');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipomesaafip);

		parent::tearDown();
	}

}
