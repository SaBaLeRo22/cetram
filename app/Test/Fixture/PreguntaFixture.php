<?php
/**
 * PreguntaFixture
 *
 */
class PreguntaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'pregunta' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'orden' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'minimo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'maximo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'multiplicadore_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'agrupamiento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'opciones' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'unidade_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'pregunta' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'orden' => 1,
			'minimo' => 1,
			'maximo' => 1,
			'multiplicadore_id' => 1,
			'agrupamiento_id' => 1,
			'opciones' => 1,
			'unidade_id' => 1,
			'estado_id' => 1,
			'created' => '2017-05-14 19:55:39',
			'modified' => '2017-05-14 19:55:39',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
