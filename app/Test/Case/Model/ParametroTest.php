<?php
App::uses('Parametro', 'Model');

/**
 * Parametro Test Case
 *
 */
class ParametroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.parametro',
		'app.unidade',
		'app.estado',
		'app.ambito',
		'app.item',
		'app.participacione',
		'app.localidade',
		'app.provincia',
		'app.sectore',
		'app.tipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Parametro = ClassRegistry::init('Parametro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Parametro);

		parent::tearDown();
	}

}
