<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaTipos Controller
 *
 * @property RespuestaTipo $RespuestaTipo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaTiposController extends AppController {

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
		$this->RespuestaTipo->recursive = 0;
		$this->set('respuestaTipos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaTipo->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta tipo'));
		}
		$options = array('conditions' => array('RespuestaTipo.' . $this->RespuestaTipo->primaryKey => $id));
		$this->set('respuestaTipo', $this->RespuestaTipo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaTipo->create();
			if ($this->RespuestaTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta tipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta tipo could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaTipo->Consultum->find('list');
		$tipos = $this->RespuestaTipo->Tipo->find('list');
		$unidades = $this->RespuestaTipo->Unidade->find('list');
		$estados = $this->RespuestaTipo->Estado->find('list');
		$this->set(compact('consultas', 'tipos', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaTipo->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta tipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta tipo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaTipo.' . $this->RespuestaTipo->primaryKey => $id));
			$this->request->data = $this->RespuestaTipo->find('first', $options);
		}
		$consultas = $this->RespuestaTipo->Consultum->find('list');
		$tipos = $this->RespuestaTipo->Tipo->find('list');
		$unidades = $this->RespuestaTipo->Unidade->find('list');
		$estados = $this->RespuestaTipo->Estado->find('list');
		$this->set(compact('consultas', 'tipos', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaTipo->id = $id;
		if (!$this->RespuestaTipo->exists()) {
			throw new NotFoundException(__('Invalid respuesta tipo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaTipo->delete()) {
			$this->Session->setFlash(__('The respuesta tipo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta tipo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
