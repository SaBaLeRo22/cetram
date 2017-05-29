<?php
App::uses('AppController', 'Controller');
/**
 * Modos Controller
 *
 * @property Modo $Modo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ModosController extends AppController {

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
		$this->Modo->recursive = 0;
		$this->set('modos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Modo->exists($id)) {
			throw new NotFoundException(__('Invalid modo'));
		}
		$options = array('conditions' => array('Modo.' . $this->Modo->primaryKey => $id));
		$this->set('modo', $this->Modo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Modo->create();
			if ($this->Modo->save($this->request->data)) {
				$this->Session->setFlash(__('The modo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modo could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Modo->Estado->find('list');
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
		if (!$this->Modo->exists($id)) {
			throw new NotFoundException(__('Invalid modo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Modo->save($this->request->data)) {
				$this->Session->setFlash(__('The modo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Modo.' . $this->Modo->primaryKey => $id));
			$this->request->data = $this->Modo->find('first', $options);
		}
		$estados = $this->Modo->Estado->find('list');
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
		$this->Modo->id = $id;
		if (!$this->Modo->exists()) {
			throw new NotFoundException(__('Invalid modo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Modo->delete()) {
			$this->Session->setFlash(__('The modo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The modo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
