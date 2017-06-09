<?php
/**
 * RespuestaPasajeroFixture
 *
 */
class RespuestaPasajeroFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'consulta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tarifa' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sube' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'base' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'costo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'semestre1' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'semestre2' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes01' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes02' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes03' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes04' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes05' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes06' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes07' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes08' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes09' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes10' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes11' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mes12' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'user_created' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_modified' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'consulta_id' => 1,
			'tarifa' => 'Lorem ipsum dolor sit amet',
			'sube' => 1,
			'base' => 1,
			'costo' => 1,
			'semestre1' => 1,
			'semestre2' => 1,
			'mes01' => 1,
			'mes02' => 1,
			'mes03' => 1,
			'mes04' => 1,
			'mes05' => 1,
			'mes06' => 1,
			'mes07' => 1,
			'mes08' => 1,
			'mes09' => 1,
			'mes10' => 1,
			'mes11' => 1,
			'mes12' => 1,
			'estado_id' => 1,
			'created' => '2017-06-09 15:57:27',
			'modified' => '2017-06-09 15:57:27',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
