<?php
/**
 * InformeFixture
 *
 */
class InformeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'empresa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'fechapresentacion' => array('type' => 'date', 'null' => false, 'default' => null),
		'nropresentacion' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false),
		'auth_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'mesa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'cajabingo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'resultado_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'estadoinforme_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'resultado_id' => array('column' => 'resultado_id', 'unique' => 0),
			'estadoinforme_id' => array('column' => 'estadoinforme_id', 'unique' => 0),
			'auth_id' => array('column' => 'auth_id', 'unique' => 0),
			'mesa_id' => array('column' => 'mesa_id', 'unique' => 0),
			'cajabingo_id' => array('column' => 'cajabingo_id', 'unique' => 0),
			'empresa_id' => array('column' => 'empresa_id', 'unique' => 0)
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
			'empresa_id' => 1,
			'fechapresentacion' => '2014-11-10',
			'nropresentacion' => 1,
			'auth_id' => 1,
			'mesa_id' => 1,
			'cajabingo_id' => 1,
			'resultado_id' => 1,
			'estadoinforme_id' => 1,
			'created' => '2014-11-10 15:54:18',
			'modified' => '2014-11-10 15:54:18'
		),
	);

}
