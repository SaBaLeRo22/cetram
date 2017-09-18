<?php
App::uses('AppController', 'Controller');
/**
 * Localidades Controller
 *
 * @property Localidade $Localidade
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LocalidadesController extends AppController {

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
		$this->Localidade->recursive = 0;
		$this->set('localidades', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Localidade->exists($id)) {
			throw new NotFoundException(__('Invalid localidade'));
		}
		$options = array('conditions' => array('Localidade.' . $this->Localidade->primaryKey => $id));
		$this->set('localidade', $this->Localidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Localidade->create();
			if ($this->Localidade->save($this->request->data)) {
				$this->Session->setFlash(__('The localidade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The localidade could not be saved. Please, try again.'));
			}
		}
		$provincias = $this->Localidade->Provincia->find('list');
		$estados = $this->Localidade->Estado->find('list');
		$this->set(compact('provincias', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Localidade->exists($id)) {
			throw new NotFoundException(__('Invalid localidade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Localidade->save($this->request->data)) {
				$this->Session->setFlash(__('The localidade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The localidade could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Localidade.' . $this->Localidade->primaryKey => $id));
			$this->request->data = $this->Localidade->find('first', $options);
		}
		$provincias = $this->Localidade->Provincia->find('list');
		$estados = $this->Localidade->Estado->find('list');
		$this->set(compact('provincias', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Localidade->id = $id;
		if (!$this->Localidade->exists()) {
			throw new NotFoundException(__('Invalid localidade'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Localidade->delete()) {
			$this->Session->setFlash(__('The localidade has been deleted.'));
		} else {
			$this->Session->setFlash(__('The localidade could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function obtener_localidades($id=null) {

		//$id = $this->request->data['User']['provincia_id'];

		$this->Localidade->recursive = -1;
/*		$locs = $this->Localidade->find('all', array(
			'recursive' => -1,
			'fields' => array('id AS id, concat(nombre," (",codigopostal,")") as nombre'),
			'conditions' => array('Localidade.provincia_id' => $id,'Localidade.nombre <>' => '', 'Localidade.estado_id' => '1'),
			'order' => array('Localidade.nombre' => 'asc')));*/

		$locs = $this->Localidade->find('list', array(
			'recursive' => -1,
			'fields' => array('id AS id, concat(nombre," (",codigopostal,")") as nombre'),
			'conditions' => array('Localidade.provincia_id' => $id,'Localidade.nombre <>' => '', 'Localidade.estado_id' => '1'),
			'order' => array('Localidade.nombre' => 'asc')));

/*		$localidads = array();
		foreach ($locs as $key => $localidad) {
			$localidads[$localidad['Localidade']['id']] = str_replace('?', 'ñ', $localidad[0]['nombre']);
		}

		$this->set('localidads', $localidads);*/

		$this->set('localidads', $locs);

		$this->layout = 'ajax';

	}
}
