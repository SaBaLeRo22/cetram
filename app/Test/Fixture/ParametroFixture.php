<?php
/**
 * ParametroFixture
 *
 */
class ParametroFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'unidade_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tipo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ambito_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'editable' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'minimo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'maximo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
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
			'nombre' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'valor' => 1,
			'unidade_id' => 1,
			'tipo_id' => 1,
			'ambito_id' => 1,
			'editable' => 1,
			'minimo' => 1,
			'maximo' => 1,
			'estado_id' => 1,
			'created' => '2017-09-03 22:24:45',
			'modified' => '2017-09-03 22:24:45',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
