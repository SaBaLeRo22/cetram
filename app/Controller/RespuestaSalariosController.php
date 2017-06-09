<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaSalarios Controller
 *
 * @property RespuestaSalario $RespuestaSalario
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaSalariosController extends AppController {

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
		$this->RespuestaSalario->recursive = 0;
		$this->set('respuestaSalarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaSalario->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta salario'));
		}
		$options = array('conditions' => array('RespuestaSalario.' . $this->RespuestaSalario->primaryKey => $id));
		$this->set('respuestaSalario', $this->RespuestaSalario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaSalario->create();
			if ($this->RespuestaSalario->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta salario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta salario could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaSalario->Consultum->find('list');
		$convenios = $this->RespuestaSalario->Convenio->find('list');
		$categorias = $this->RespuestaSalario->Categorium->find('list');
		$estados = $this->RespuestaSalario->Estado->find('list');
		$this->set(compact('consultas', 'convenios', 'categorias', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaSalario->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta salario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaSalario->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta salario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta salario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaSalario.' . $this->RespuestaSalario->primaryKey => $id));
			$this->request->data = $this->RespuestaSalario->find('first', $options);
		}
		$consultas = $this->RespuestaSalario->Consultum->find('list');
		$convenios = $this->RespuestaSalario->Convenio->find('list');
		$categorias = $this->RespuestaSalario->Categorium->find('list');
		$estados = $this->RespuestaSalario->Estado->find('list');
		$this->set(compact('consultas', 'convenios', 'categorias', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaSalario->id = $id;
		if (!$this->RespuestaSalario->exists()) {
			throw new NotFoundException(__('Invalid respuesta salario'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaSalario->delete()) {
			$this->Session->setFlash(__('The respuesta salario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta salario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
