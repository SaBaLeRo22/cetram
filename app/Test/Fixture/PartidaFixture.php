<?php
/**
 * PartidaFixture
 *
 */
class PartidaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cajabingo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'nropartida' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false),
		'fechahorainicio' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'valorcarton' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'cantidadcartonesserie' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => false),
		'cantidadcartonesvendidos' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => false),
		'nroprimercartonvendido' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => false),
		'nroultimocartonvendido' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => false),
		'totalvendido' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totalpremiospagados' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'cajabingo_id' => array('column' => 'cajabingo_id', 'unique' => 0)
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
			'cajabingo_id' => 1,
			'nropartida' => 1,
			'fechahorainicio' => '2014-11-07 14:45:27',
			'valorcarton' => 1,
			'cantidadcartonesserie' => 1,
			'cantidadcartonesvendidos' => 1,
			'nroprimercartonvendido' => 1,
			'nroultimocartonvendido' => 1,
			'totalvendido' => 1,
			'totalpremiospagados' => 1,
			'created' => '2014-11-07 14:45:27',
			'modified' => '2014-11-07 14:45:27'
		),
	);

}
