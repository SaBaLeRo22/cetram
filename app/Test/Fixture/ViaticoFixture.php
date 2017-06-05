<?php
/**
 * ViaticoFixture
 *
 */
class ViaticoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'convenio_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'dieta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'costo' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '11,3', 'unsigned' => false),
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
			'convenio_id' => 1,
			'dieta_id' => 1,
			'costo' => 1,
			'estado_id' => 1,
			'created' => '2017-06-05 15:43:43',
			'modified' => '2017-06-05 15:43:43',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
