<?php
App::uses('Participacione', 'Model');

/**
 * Participacione Test Case
 *
 */
class ParticipacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.participacione',
		'app.parametro',
		'app.unidade',
		'app.estado',
		'app.ambito',
		'app.item',
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
		$this->Participacione = ClassRegistry::init('Participacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Participacione);

		parent::tearDown();
	}

}
