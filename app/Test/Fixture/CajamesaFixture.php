<?php
/**
 * CajamesaFixture
 *
 */
class CajamesaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'mesa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'tipomesa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'cantidadmesas' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'efectivoapertura' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'efectivocierre' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'importeeqfichasapertura' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'importeeqfichascierre' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totalretiros' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totalretiroseqfichas' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totalreposiciones' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totalreposicioneseqfichas' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totalventas' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totalpagos' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'diferenciacaja' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'totaleqticketsfondpromotorg' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'totaleqticketsfondpromrecup' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => true),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'mesa_id' => array('column' => 'mesa_id', 'unique' => 0),
			'tipomesa_id' => array('column' => 'tipomesa_id', 'unique' => 0)
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
			'mesa_id' => 1,
			'tipomesa_id' => 1,
			'cantidadmesas' => 1,
			'efectivoapertura' => 1,
			'efectivocierre' => 1,
			'importeeqfichasapertura' => 1,
			'importeeqfichascierre' => 1,
			'totalretiros' => 1,
			'totalretiroseqfichas' => 1,
			'totalreposiciones' => 1,
			'totalreposicioneseqfichas' => 1,
			'totalventas' => 1,
			'totalpagos' => 1,
			'diferenciacaja' => 1,
			'totaleqticketsfondpromotorg' => 1,
			'totaleqticketsfondpromrecup' => 1,
			'created' => '2014-11-07 14:38:50',
			'modified' => '2014-11-07 14:38:50'
		),
	);

}
