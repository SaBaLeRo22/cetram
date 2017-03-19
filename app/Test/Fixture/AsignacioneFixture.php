<?php
/**
 * AsignacioneFixture
 *
 */
class AsignacioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'observaciones' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'usuario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'ambiente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'estado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'unique'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'user_created' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'user_modified' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'estado_id' => array('column' => 'estado_id', 'unique' => 1),
			'usuario_id' => array('column' => 'usuario_id', 'unique' => 0),
			'ambiente_id' => array('column' => 'ambiente_id', 'unique' => 0),
			'role_id' => array('column' => 'role_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'usuario_id' => 1,
			'role_id' => 1,
			'ambiente_id' => 1,
			'estado_id' => 1,
			'created' => '2015-07-17 14:12:42',
			'modified' => '2015-07-17 14:12:42',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
