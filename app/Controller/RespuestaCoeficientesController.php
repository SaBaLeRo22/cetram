<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaCoeficientes Controller
 *
 * @property RespuestaCoeficiente $RespuestaCoeficiente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaCoeficientesController extends AppController {

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
		$this->RespuestaCoeficiente->recursive = 0;
		$this->set('respuestaCoeficientes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaCoeficiente->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta coeficiente'));
		}
		$options = array('conditions' => array('RespuestaCoeficiente.' . $this->RespuestaCoeficiente->primaryKey => $id));
		$this->set('respuestaCoeficiente', $this->RespuestaCoeficiente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaCoeficiente->create();
			if ($this->RespuestaCoeficiente->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta coeficiente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta coeficiente could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaCoeficiente->Consulta->find('list');
		$coeficientes = $this->RespuestaCoeficiente->Coeficiente->find('list');
		$unidades = $this->RespuestaCoeficiente->Unidade->find('list');
		$estados = $this->RespuestaCoeficiente->Estado->find('list');
		$this->set(compact('consultas', 'coeficientes', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaCoeficiente->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta coeficiente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaCoeficiente->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta coeficiente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta coeficiente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaCoeficiente.' . $this->RespuestaCoeficiente->primaryKey => $id));
			$this->request->data = $this->RespuestaCoeficiente->find('first', $options);
		}
		$consultas = $this->RespuestaCoeficiente->Consultum->find('list');
		$coeficientes = $this->RespuestaCoeficiente->Coeficiente->find('list');
		$unidades = $this->RespuestaCoeficiente->Unidade->find('list');
		$estados = $this->RespuestaCoeficiente->Estado->find('list');
		$this->set(compact('consultas', 'coeficientes', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaCoeficiente->id = $id;
		if (!$this->RespuestaCoeficiente->exists()) {
			throw new NotFoundException(__('Invalid respuesta coeficiente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaCoeficiente->delete()) {
			$this->Session->setFlash(__('The respuesta coeficiente has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta coeficiente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
