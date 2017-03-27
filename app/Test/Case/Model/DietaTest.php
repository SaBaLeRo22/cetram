<?php
App::uses('Dieta', 'Model');

/**
 * Dieta Test Case
 *
 */
class DietaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dieta',
		'app.estado',
		'app.ambito',
		'app.parametro',
		'app.unidade',
		'app.tipo',
		'app.participacione',
		'app.item',
		'app.localidade',
		'app.provincia',
		'app.sectore',
		'app.viatico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dieta = ClassRegistry::init('Dieta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dieta);

		parent::tearDown();
	}

}
