<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaParametros Controller
 *
 * @property RespuestaParametro $RespuestaParametro
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaParametrosController extends AppController {

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
		$this->RespuestaParametro->recursive = 0;
		$this->set('respuestaParametros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaParametro->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta parametro'));
		}
		$options = array('conditions' => array('RespuestaParametro.' . $this->RespuestaParametro->primaryKey => $id));
		$this->set('respuestaParametro', $this->RespuestaParametro->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaParametro->create();
			if ($this->RespuestaParametro->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta parametro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta parametro could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaParametro->Consultum->find('list');
		$parametros = $this->RespuestaParametro->Parametro->find('list');
		$unidades = $this->RespuestaParametro->Unidade->find('list');
		$estados = $this->RespuestaParametro->Estado->find('list');
		$this->set(compact('consultas', 'parametros', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaParametro->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta parametro'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaParametro->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta parametro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta parametro could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaParametro.' . $this->RespuestaParametro->primaryKey => $id));
			$this->request->data = $this->RespuestaParametro->find('first', $options);
		}
		$consultas = $this->RespuestaParametro->Consultum->find('list');
		$parametros = $this->RespuestaParametro->Parametro->find('list');
		$unidades = $this->RespuestaParametro->Unidade->find('list');
		$estados = $this->RespuestaParametro->Estado->find('list');
		$this->set(compact('consultas', 'parametros', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaParametro->id = $id;
		if (!$this->RespuestaParametro->exists()) {
			throw new NotFoundException(__('Invalid respuesta parametro'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaParametro->delete()) {
			$this->Session->setFlash(__('The respuesta parametro has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta parametro could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
