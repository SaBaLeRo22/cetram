<?php

App::uses('AuthakeAppModel', 'Authake.Model');
class Localidad extends AuthakeAppModel {

    var $name = 'Localidad';
    var $useTable = 'localidades';
    var $useDbConfig = 'default';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'nombre';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'nombre' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Ya existe el nombre de Área'
            ),
        ),
        'provincia_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        )

    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Provincia' => array(
            'className' => 'Provincia',
            'foreignKey' => 'provincia_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'localidad_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
