<?php
/**
 * RespuestaMultiplicadoreFixture
 *
 */
class RespuestaMultiplicadoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'consulta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'multiplicadore_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'multiplicador' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'ponderador' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
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
			'consulta_id' => 1,
			'multiplicadore_id' => 1,
			'multiplicador' => 'Lorem ipsum dolor sit amet',
			'ponderador' => 1,
			'estado_id' => 1,
			'created' => '2017-05-18 16:11:27',
			'modified' => '2017-05-18 16:11:27',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
