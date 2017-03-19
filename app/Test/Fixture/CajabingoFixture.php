<?php
/**
 * CajabingoFixture
 *
 */
class CajabingoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => null),
		'efectivoapertura' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'efectivocierre' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totalventas' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totalpagos' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'diferenciacaja' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'estadobingo_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'modified' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'estadobingo_id' => array('column' => 'estadobingo_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'fecha' => '2014-11-07',
			'efectivoapertura' => 1,
			'efectivocierre' => 1,
			'totalventas' => 1,
			'totalpagos' => 1,
			'diferenciacaja' => 1,
			'estadobingo_id' => 1,
			'created' => 1,
			'modified' => 1
		),
	);

}
