<?php
/**
 * RespuestaCoeficienteFixture
 *
 */
class RespuestaCoeficienteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'consulta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'coeficiente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'coeficiente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'valor' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'minimo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'maximo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
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
			'coeficiente_id' => 1,
			'coeficiente' => 'Lorem ipsum dolor sit amet',
			'valor' => 1,
			'minimo' => 1,
			'maximo' => 1,
			'unidade_id' => 1,
			'unidad' => 'Lorem ipsum dolor sit amet',
			'estado_id' => 1,
			'created' => '2017-05-18 16:08:40',
			'modified' => '2017-05-18 16:08:40',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
