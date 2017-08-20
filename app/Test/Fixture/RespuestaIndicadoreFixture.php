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
		'alerta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'evento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indicador' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'alerta' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'notificar' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'mensaje' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'evento' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'color' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'valor' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'menor' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'minimo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'maximo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'mayor' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'unidade_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'unidad' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
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
			'alerta_id' => 1,
			'evento_id' => 1,
			'indicador' => 'Lorem ipsum dolor sit amet',
			'alerta' => 'Lorem ipsum dolor sit amet',
			'notificar' => 1,
			'mensaje' => 'Lorem ipsum dolor sit amet',
			'evento' => 'Lorem ipsum dolor sit amet',
			'color' => 'Lorem ipsum dolor sit amet',
			'valor' => 1,
			'menor' => 1,
			'minimo' => 1,
			'maximo' => 1,
			'mayor' => 1,
			'unidade_id' => 1,
			'unidad' => 'Lorem ipsum dolor sit amet',
			'estado_id' => 1,
			'created' => '2017-08-20 14:30:08',
			'modified' => '2017-08-20 14:30:08',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
