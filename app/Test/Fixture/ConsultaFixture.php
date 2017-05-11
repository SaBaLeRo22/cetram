<?php
/**
 * ConsultaFixture
 *
 */
class ConsultaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'costo' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'tarifa' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'subsidio' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'observaciones' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1000, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'user_created' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_modified' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'costo' => 1,
			'tarifa' => 1,
			'subsidio' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'estado_id' => 1,
			'created' => '2017-05-11 11:45:21',
			'modified' => '2017-05-11 11:45:21',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
