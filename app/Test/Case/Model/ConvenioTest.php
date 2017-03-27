<?php
App::uses('Convenio', 'Model');

/**
 * Convenio Test Case
 *
 */
class ConvenioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.convenio',
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
		'app.salario',
		'app.viatico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Convenio = ClassRegistry::init('Convenio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Convenio);

		parent::tearDown();
	}

}
