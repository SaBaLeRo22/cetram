<?php
/**
 * RespuestaSalarioFixture
 *
 */
class RespuestaSalarioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'consulta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'convenio_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'anio' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'inicio' => array('type' => 'date', 'null' => true, 'default' => null),
		'fin' => array('type' => 'date', 'null' => true, 'default' => null),
		'categoria_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'categoria' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'salario' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'cantidad' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'convenio_id' => 1,
			'anio' => 1,
			'inicio' => '2017-06-09',
			'fin' => '2017-06-09',
			'categoria_id' => 1,
			'categoria' => 'Lorem ipsum dolor sit amet',
			'salario' => 1,
			'cantidad' => 1,
			'estado_id' => 1,
			'created' => '2017-06-09 16:00:02',
			'modified' => '2017-06-09 16:00:02',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
