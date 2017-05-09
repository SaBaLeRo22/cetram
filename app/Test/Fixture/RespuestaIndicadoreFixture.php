<?php
/**
 * RespuestaIndicadoreFixture
 *
 */
class RespuestaIndicadoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'consulta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indicadore_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indicador' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'notificar' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'valor' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'minimo' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'maximo' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'unidade_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'unidad' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
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
			'indicadore_id' => 1,
			'indicador' => 'Lorem ipsum dolor sit amet',
			'notificar' => 1,
			'valor' => 1,
			'minimo' => 1,
			'maximo' => 1,
			'unidade_id' => 1,
			'unidad' => 'Lorem ipsum dolor sit amet',
			'estado_id' => 1,
			'created' => '2017-05-09 20:16:10',
			'modified' => '2017-05-09 20:16:10',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
