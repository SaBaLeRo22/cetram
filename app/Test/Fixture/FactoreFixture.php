<?php
/**
 * FactoreFixture
 *
 */
class FactoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 25, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'antiguedad_maxima' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'valor_residual' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'porcentaje_amortizar' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'user_created' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'user_modified' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'nombre' => 'Lorem ipsum dolor sit a',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'antiguedad_maxima' => 1,
			'valor_residual' => 1,
			'porcentaje_amortizar' => 1,
			'estado_id' => 1,
			'created' => '2017-04-14 12:35:07',
			'modified' => '2017-04-14 12:35:07',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
