<?php
App::uses('AppController', 'Controller');
/**
 * Pasos Controller
 *
 * @property Paso $Paso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PasosController extends AppController {

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
		$this->Paso->recursive = 0;
		$this->set('pasos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Paso->exists($id)) {
			throw new NotFoundException(__('Invalid paso'));
		}
		$options = array('conditions' => array('Paso.' . $this->Paso->primaryKey => $id));
		$this->set('paso', $this->Paso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Paso->create();
			if ($this->Paso->save($this->request->data)) {
				$this->Session->setFlash(__('The paso has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The paso could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->Paso->Consultum->find('list');
		$agrupamientos = $this->Paso->Agrupamiento->find('list');
		$estados = $this->Paso->Estado->find('list');
		$this->set(compact('consultas', 'agrupamientos', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Paso->exists($id)) {
			throw new NotFoundException(__('Invalid paso'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Paso->save($this->request->data)) {
				$this->Session->setFlash(__('The paso has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The paso could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Paso.' . $this->Paso->primaryKey => $id));
			$this->request->data = $this->Paso->find('first', $options);
		}
		$consultas = $this->Paso->Consultum->find('list');
		$agrupamientos = $this->Paso->Agrupamiento->find('list');
		$estados = $this->Paso->Estado->find('list');
		$this->set(compact('consultas', 'agrupamientos', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Paso->id = $id;
		if (!$this->Paso->exists()) {
			throw new NotFoundException(__('Invalid paso'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Paso->delete()) {
			$this->Session->setFlash(__('The paso has been deleted.'));
		} else {
			$this->Session->setFlash(__('The paso could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
