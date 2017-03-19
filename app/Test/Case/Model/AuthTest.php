<?php
App::uses('Auth', 'Model');

/**
 * Auth Test Case
 *
 */
class AuthTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.auth',
		'app.informe',
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
		$this->Auth = ClassRegistry::init('Auth');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Auth);

		parent::tearDown();
	}

}
