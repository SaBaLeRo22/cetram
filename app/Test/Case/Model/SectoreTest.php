<?php
App::uses('Sectore', 'Model');

/**
 * Sectore Test Case
 *
 */
class SectoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sectore',
		'app.estado',
		'app.ambito',
		'app.localidade',
		'app.provincia',
		'app.parametro',
		'app.tipo',
		'app.ambiente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sectore = ClassRegistry::init('Sectore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sectore);

		parent::tearDown();
	}

}
