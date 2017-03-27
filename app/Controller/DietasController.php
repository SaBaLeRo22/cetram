<?php
App::uses('AppController', 'Controller');
/**
 * Dietas Controller
 *
 * @property Dieta $Dieta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DietasController extends AppController {

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
		$this->Dieta->recursive = 0;
		$this->set('dietas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dieta->exists($id)) {
			throw new NotFoundException(__('Invalid dieta'));
		}
		$options = array('conditions' => array('Dieta.' . $this->Dieta->primaryKey => $id));
		$this->set('dieta', $this->Dieta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dieta->create();
			if ($this->Dieta->save($this->request->data)) {
				$this->Session->setFlash(__('The dieta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dieta could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Dieta->Estado->find('list');
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
		if (!$this->Dieta->exists($id)) {
			throw new NotFoundException(__('Invalid dieta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dieta->save($this->request->data)) {
				$this->Session->setFlash(__('The dieta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dieta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Dieta.' . $this->Dieta->primaryKey => $id));
			$this->request->data = $this->Dieta->find('first', $options);
		}
		$estados = $this->Dieta->Estado->find('list');
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
		$this->Dieta->id = $id;
		if (!$this->Dieta->exists()) {
			throw new NotFoundException(__('Invalid dieta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dieta->delete()) {
			$this->Session->setFlash(__('The dieta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dieta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
