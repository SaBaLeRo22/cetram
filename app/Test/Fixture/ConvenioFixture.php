<?php
/**
 * ConvenioFixture
 *
 */
class ConvenioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'anio' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'inio' => array('type' => 'date', 'null' => false, 'default' => null),
		'fin' => array('type' => 'date', 'null' => false, 'default' => null),
		'observaciones' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
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
			'anio' => 1,
			'inio' => '2017-06-05',
			'fin' => '2017-06-05',
			'observaciones' => 'Lorem ipsum dolor sit amet',
			'estado_id' => 1,
			'created' => '2017-06-05 15:41:37',
			'modified' => '2017-06-05 15:41:37',
			'user_created' => 1,
			'user_modified' => 1
		),
	);

}
