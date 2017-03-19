<?php

App::uses('AuthakeAppModel', 'Authake.Model');
class Provincia extends AuthakeAppModel {

    var $name = 'Provincia';
    var $useTable = 'provincias';
    var $useDbConfig = 'authake';

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
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */


    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Localidad' => array(
            'className' => 'Localidad',
            'foreignKey' => 'provincia_id',
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
