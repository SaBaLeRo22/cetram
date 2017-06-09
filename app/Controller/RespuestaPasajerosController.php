<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaPasajeros Controller
 *
 * @property RespuestaPasajero $RespuestaPasajero
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaPasajerosController extends AppController {

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
		$this->RespuestaPasajero->recursive = 0;
		$this->set('respuestaPasajeros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaPasajero->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta pasajero'));
		}
		$options = array('conditions' => array('RespuestaPasajero.' . $this->RespuestaPasajero->primaryKey => $id));
		$this->set('respuestaPasajero', $this->RespuestaPasajero->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaPasajero->create();
			if ($this->RespuestaPasajero->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta pasajero has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta pasajero could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaPasajero->Consultum->find('list');
		$estados = $this->RespuestaPasajero->Estado->find('list');
		$this->set(compact('consultas', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaPasajero->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta pasajero'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaPasajero->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta pasajero has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta pasajero could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaPasajero.' . $this->RespuestaPasajero->primaryKey => $id));
			$this->request->data = $this->RespuestaPasajero->find('first', $options);
		}
		$consultas = $this->RespuestaPasajero->Consultum->find('list');
		$estados = $this->RespuestaPasajero->Estado->find('list');
		$this->set(compact('consultas', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaPasajero->id = $id;
		if (!$this->RespuestaPasajero->exists()) {
			throw new NotFoundException(__('Invalid respuesta pasajero'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaPasajero->delete()) {
			$this->Session->setFlash(__('The respuesta pasajero has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta pasajero could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * eliminar method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function eliminar($id = null) {
		$this->RespuestaPasajero->id = $id;
		if (!$this->RespuestaPasajero->exists()) {
			throw new NotFoundException(__('Invalid respuesta pasajero'));
		}

		$options = array('conditions' => array('RespuestaPasajero.' . $this->RespuestaPasajero->primaryKey => $id));
		$respuestaPasajero = $this->RespuestaPasajero->find('first', $options);

		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaPasajero->delete()) {
			$this->Session->setFlash(__('Tarifa eliminada correctamente.'));
		} else {
			$this->Session->setFlash(__('Tarifa no se pudo eliminar. Por favor, intente nuevamente.'));
		}
		return $this->redirect(array('controller' => 'consultas', 'action' => 'tres',$respuestaPasajero['RespuestaPasajero']['consulta_id']));
	}
}
