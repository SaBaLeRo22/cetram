<?php
App::uses('AppController', 'Controller');
/**
 * Multiplicadores Controller
 *
 * @property Multiplicadore $Multiplicadore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MultiplicadoresController extends AppController {

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
		$this->Multiplicadore->recursive = 0;
		$this->set('multiplicadores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Multiplicadore->exists($id)) {
			throw new NotFoundException(__('Invalid multiplicadore'));
		}
		$options = array('conditions' => array('Multiplicadore.' . $this->Multiplicadore->primaryKey => $id));
		$this->set('multiplicadore', $this->Multiplicadore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Multiplicadore->create();
			if ($this->Multiplicadore->save($this->request->data)) {
				$this->Session->setFlash(__('The multiplicadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The multiplicadore could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Multiplicadore->Estado->find('list');
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
		if (!$this->Multiplicadore->exists($id)) {
			throw new NotFoundException(__('Invalid multiplicadore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Multiplicadore->save($this->request->data)) {
				$this->Session->setFlash(__('The multiplicadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The multiplicadore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Multiplicadore.' . $this->Multiplicadore->primaryKey => $id));
			$this->request->data = $this->Multiplicadore->find('first', $options);
		}
		$estados = $this->Multiplicadore->Estado->find('list');
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
		$this->Multiplicadore->id = $id;
		if (!$this->Multiplicadore->exists()) {
			throw new NotFoundException(__('Invalid multiplicadore'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Multiplicadore->delete()) {
			$this->Session->setFlash(__('The multiplicadore has been deleted.'));
		} else {
			$this->Session->setFlash(__('The multiplicadore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
