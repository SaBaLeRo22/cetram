<?php
/**
 * AlertaFixture
 *
 */
class AlertaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indicadore_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'evento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'menor' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'minimo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'maximo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '11,3', 'unsigned' => false),
		'mayor' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'notificar' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'mensaje' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
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
			'indicadore_id' => 1,
			'evento_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'menor' => 1,
			'minimo' => 1,
			'maximo' => 1,
			'mayor' => 1,
			'notificar' => 1,
			'mensaje' => 'Lorem ipsum dolor sit amet',
			'estado_id' => 1,
			'created' => '2017-08-20 14:25:10',
			'modified' => '2017-08-20 14:25:10',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
