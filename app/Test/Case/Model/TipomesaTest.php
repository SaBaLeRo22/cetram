<?php
App::uses('Tipomesa', 'Model');

/**
 * Tipomesa Test Case
 *
 */
class TipomesaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipomesa',
		'app.tipomesapim',
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
		$this->Tipomesa = ClassRegistry::init('Tipomesa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipomesa);

		parent::tearDown();
	}

}
