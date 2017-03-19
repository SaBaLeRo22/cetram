<?php
App::uses('Localidade', 'Model');

/**
 * Localidade Test Case
 *
 */
class LocalidadeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.localidade',
		'app.provincia',
		'app.localidad',
		'app.user',
		'app.estado',
		'app.ambito',
		'app.parametro',
		'app.tipo',
		'app.ambiente',
		'app.sectore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Localidade = ClassRegistry::init('Localidade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Localidade);

		parent::tearDown();
	}

}
