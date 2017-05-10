<?php
App::uses('AppController', 'Controller');
/**
 * Agrupamientos Controller
 *
 * @property Agrupamiento $Agrupamiento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AgrupamientosController extends AppController {

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
		$this->Agrupamiento->recursive = 0;
		$this->set('agrupamientos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Agrupamiento->exists($id)) {
			throw new NotFoundException(__('Invalid agrupamiento'));
		}
		$options = array('conditions' => array('Agrupamiento.' . $this->Agrupamiento->primaryKey => $id));
		$this->set('agrupamiento', $this->Agrupamiento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Agrupamiento->create();
			if ($this->Agrupamiento->save($this->request->data)) {
				$this->Session->setFlash(__('The agrupamiento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agrupamiento could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Agrupamiento->Estado->find('list');
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
		if (!$this->Agrupamiento->exists($id)) {
			throw new NotFoundException(__('Invalid agrupamiento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Agrupamiento->save($this->request->data)) {
				$this->Session->setFlash(__('The agrupamiento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agrupamiento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Agrupamiento.' . $this->Agrupamiento->primaryKey => $id));
			$this->request->data = $this->Agrupamiento->find('first', $options);
		}
		$estados = $this->Agrupamiento->Estado->find('list');
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
		$this->Agrupamiento->id = $id;
		if (!$this->Agrupamiento->exists()) {
			throw new NotFoundException(__('Invalid agrupamiento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Agrupamiento->delete()) {
			$this->Session->setFlash(__('The agrupamiento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The agrupamiento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
