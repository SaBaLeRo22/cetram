<?php

App::uses('AppController', 'Controller');

/**
 * Asignaciones Controller
 *
 * @property Asignacione $Asignacione
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ConsultasController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //debug($this->Session->read('Authake'));
}

}
