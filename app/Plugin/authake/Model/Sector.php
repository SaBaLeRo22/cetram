<?php

App::uses('AuthakeAppModel', 'Authake.Model');
class Sector extends AuthakeAppModel {

    var $name = 'Sector';
    var $useTable = 'sectores';
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

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'sector_id',
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
