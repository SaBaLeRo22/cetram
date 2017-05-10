<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaIndicadores Controller
 *
 * @property RespuestaIndicadore $RespuestaIndicadore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaIndicadoresController extends AppController {

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
		$this->RespuestaIndicadore->recursive = 0;
		$this->set('respuestaIndicadores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaIndicadore->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta indicadore'));
		}
		$options = array('conditions' => array('RespuestaIndicadore.' . $this->RespuestaIndicadore->primaryKey => $id));
		$this->set('respuestaIndicadore', $this->RespuestaIndicadore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaIndicadore->create();
			if ($this->RespuestaIndicadore->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta indicadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta indicadore could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaIndicadore->Consultum->find('list');
		$indicadores = $this->RespuestaIndicadore->Indicadore->find('list');
		$unidades = $this->RespuestaIndicadore->Unidade->find('list');
		$estados = $this->RespuestaIndicadore->Estado->find('list');
		$this->set(compact('consultas', 'indicadores', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaIndicadore->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta indicadore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaIndicadore->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta indicadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta indicadore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaIndicadore.' . $this->RespuestaIndicadore->primaryKey => $id));
			$this->request->data = $this->RespuestaIndicadore->find('first', $options);
		}
		$consultas = $this->RespuestaIndicadore->Consultum->find('list');
		$indicadores = $this->RespuestaIndicadore->Indicadore->find('list');
		$unidades = $this->RespuestaIndicadore->Unidade->find('list');
		$estados = $this->RespuestaIndicadore->Estado->find('list');
		$this->set(compact('consultas', 'indicadores', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaIndicadore->id = $id;
		if (!$this->RespuestaIndicadore->exists()) {
			throw new NotFoundException(__('Invalid respuesta indicadore'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaIndicadore->delete()) {
			$this->Session->setFlash(__('The respuesta indicadore has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta indicadore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
