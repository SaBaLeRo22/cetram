<?php
/**
 * RespuestaPreguntaFixture
 *
 */
class RespuestaPreguntaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'consulta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'pregunta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'pregunta' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'valor' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'minimo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'maximo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'unidade_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'unidad' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'respuesta' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'opcione_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'funcion' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
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
			'pregunta_id' => 1,
			'pregunta' => 'Lorem ipsum dolor sit amet',
			'valor' => 1,
			'minimo' => 1,
			'maximo' => 1,
			'unidade_id' => 1,
			'unidad' => 'Lorem ipsum dolor sit amet',
			'respuesta' => 'Lorem ipsum dolor sit amet',
			'opcione_id' => 1,
			'funcion' => 1,
			'estado_id' => 1,
			'created' => '2017-05-18 16:12:28',
			'modified' => '2017-05-18 16:12:28',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
