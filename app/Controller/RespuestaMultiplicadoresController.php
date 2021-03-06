<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaMultiplicadores Controller
 *
 * @property RespuestaMultiplicadore $RespuestaMultiplicadore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaMultiplicadoresController extends AppController {

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
		$this->RespuestaMultiplicadore->recursive = 0;
		$this->set('respuestaMultiplicadores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaMultiplicadore->exists($id)) {
			throw new NotFoundException(__('No existe respuesta asociada.'));
		}
		$options = array('conditions' => array('RespuestaMultiplicadore.' . $this->RespuestaMultiplicadore->primaryKey => $id));
		$this->set('respuestaMultiplicadore', $this->RespuestaMultiplicadore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaMultiplicadore->create();
			if ($this->RespuestaMultiplicadore->save($this->request->data)) {
				$this->Session->setFlash(__('La respuesta fue registrada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La respuesta no se pudo registrar.'));
			}
		}
		$consultas = $this->RespuestaMultiplicadore->Consultum->find('list');
		$multiplicadores = $this->RespuestaMultiplicadore->Multiplicadore->find('list');
		$estados = $this->RespuestaMultiplicadore->Estado->find('list');
		$this->set(compact('consultas', 'multiplicadores', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaMultiplicadore->exists($id)) {
			throw new NotFoundException(__('No existe respuesta asociada.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaMultiplicadore->save($this->request->data)) {
				$this->Session->setFlash(__('La respuesta fue editada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La respuesta no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaMultiplicadore.' . $this->RespuestaMultiplicadore->primaryKey => $id));
			$this->request->data = $this->RespuestaMultiplicadore->find('first', $options);
		}
		$consultas = $this->RespuestaMultiplicadore->Consultum->find('list');
		$multiplicadores = $this->RespuestaMultiplicadore->Multiplicadore->find('list');
		$estados = $this->RespuestaMultiplicadore->Estado->find('list');
		$this->set(compact('consultas', 'multiplicadores', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaMultiplicadore->id = $id;
		if (!$this->RespuestaMultiplicadore->exists()) {
			throw new NotFoundException(__('No existe respuesta asociada.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaMultiplicadore->delete()) {
			$this->Session->setFlash(__('La respuesta fue eliminada.'));
		} else {
			$this->Session->setFlash(__('La respuesta no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
