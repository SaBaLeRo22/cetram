<?php
App::uses('AppModel', 'Model');
/**
 * RespuestaIndicadore Model
 *
 * @property Consulta $Consulta
 * @property Indicadore $Indicadore
 * @property Alerta $Alerta
 * @property Evento $Evento
 * @property Unidade $Unidade
 * @property Estado $Estado
 */
class RespuestaIndicadore extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'indicador';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'consulta_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'indicadore_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'alerta_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'evento_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estado_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_created' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_modified' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Consulta' => array(
			'className' => 'Consulta',
			'foreignKey' => 'consulta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Indicadore' => array(
			'className' => 'Indicadore',
			'foreignKey' => 'indicadore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Alerta' => array(
			'className' => 'Alerta',
			'foreignKey' => 'alerta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Evento' => array(
			'className' => 'Evento',
			'foreignKey' => 'evento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Unidade' => array(
			'className' => 'Unidade',
			'foreignKey' => 'unidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'estado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
