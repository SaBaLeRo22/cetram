<?php
App::uses('AppController', 'Controller');
/**
 * Viaticos Controller
 *
 * @property Viatico $Viatico
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ViaticosController extends AppController {

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
		$this->Viatico->recursive = 0;
		$this->set('viaticos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Viatico->exists($id)) {
			throw new NotFoundException(__('Invalid viatico'));
		}
		$options = array('conditions' => array('Viatico.' . $this->Viatico->primaryKey => $id));
		$this->set('viatico', $this->Viatico->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Viatico->create();
			if ($this->Viatico->save($this->request->data)) {
				$this->Session->setFlash(__('The viatico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The viatico could not be saved. Please, try again.'));
			}
		}
		$convenios = $this->Viatico->Convenio->find('list');
		$dietas = $this->Viatico->Dieta->find('list');
		$estados = $this->Viatico->Estado->find('list');
		$this->set(compact('convenios', 'dietas', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Viatico->exists($id)) {
			throw new NotFoundException(__('Invalid viatico'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Viatico->save($this->request->data)) {
				$this->Session->setFlash(__('The viatico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The viatico could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Viatico.' . $this->Viatico->primaryKey => $id));
			$this->request->data = $this->Viatico->find('first', $options);
		}
		$convenios = $this->Viatico->Convenio->find('list');
		$dietas = $this->Viatico->Dieta->find('list');
		$estados = $this->Viatico->Estado->find('list');
		$this->set(compact('convenios', 'dietas', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Viatico->id = $id;
		if (!$this->Viatico->exists()) {
			throw new NotFoundException(__('Invalid viatico'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Viatico->delete()) {
			$this->Session->setFlash(__('The viatico has been deleted.'));
		} else {
			$this->Session->setFlash(__('The viatico could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
