<?php
/**
 * AuthFixture
 *
 */
class AuthFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'token' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sign' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'uniqueid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'generationtime' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'expirationtime' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'source_cn' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'source_o' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'source_c' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'source_cuit' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'destination_cn' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'destination_o' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'destination_c' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'destination_cuit' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'token' => 'Lorem ipsum dolor sit amet',
			'sign' => 'Lorem ipsum dolor sit amet',
			'uniqueid' => 1,
			'generationtime' => '2014-11-07 14:36:26',
			'expirationtime' => '2014-11-07 14:36:26',
			'source_cn' => 'Lorem ipsum dolor sit amet',
			'source_o' => 'Lorem ipsum dolor sit amet',
			'source_c' => 'Lorem ipsum dolor sit amet',
			'source_cuit' => 1,
			'destination_cn' => 'Lorem ipsum dolor sit amet',
			'destination_o' => 'Lorem ipsum dolor sit amet',
			'destination_c' => 'Lorem ipsum dolor sit amet',
			'destination_cuit' => 1,
			'created' => '2014-11-07 14:36:26',
			'modified' => '2014-11-07 14:36:26'
		),
	);

}
