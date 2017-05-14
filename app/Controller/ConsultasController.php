<?php
App::uses('AppController', 'Controller');
/**
 * Consultas Controller
 *
 * @property Consulta $Consulta
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
		$this->Consulta->recursive = 0;
		$this->set('consultas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Consulta->exists($id)) {
			throw new NotFoundException(__('Invalid consulta'));
		}
		$options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
		$this->set('consulta', $this->Consulta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Consulta->create();
			if ($this->Consulta->save($this->request->data)) {
				$this->Session->setFlash(__('The consulta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Consulta->Estado->find('list');
		$this->set(compact('estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Consulta->exists($id)) {
			throw new NotFoundException(__('Invalid consulta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Consulta->save($this->request->data)) {
				$this->Session->setFlash(__('The consulta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
			$this->request->data = $this->Consulta->find('first', $options);
		}
		$estados = $this->Consulta->Estado->find('list');
		$this->set(compact('estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Consulta->id = $id;
		if (!$this->Consulta->exists()) {
			throw new NotFoundException(__('Invalid consulta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Consulta->delete()) {
			$this->Session->setFlash(__('The consulta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The consulta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * realizar method
	 *
	 * @return void
	 */
	public function realizar() {
		if ($this->request->is('post')) {
			$this->Consulta->create();
			if ($this->Consulta->save($this->request->data)) {
				$this->Session->setFlash(__('The consulta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Consulta->Estado->find('list');
		$this->set(compact('estados'));
	}
}
