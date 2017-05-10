<?php
App::uses('AppController', 'Controller');
/**
 * Intervenciones Controller
 *
 * @property Intervencione $Intervencione
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class IntervencionesController extends AppController {

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
		$this->Intervencione->recursive = 0;
		$this->set('intervenciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Intervencione->exists($id)) {
			throw new NotFoundException(__('Invalid intervencione'));
		}
		$options = array('conditions' => array('Intervencione.' . $this->Intervencione->primaryKey => $id));
		$this->set('intervencione', $this->Intervencione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Intervencione->create();
			if ($this->Intervencione->save($this->request->data)) {
				$this->Session->setFlash(__('The intervencione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The intervencione could not be saved. Please, try again.'));
			}
		}
		$coeficientes = $this->Intervencione->Coeficiente->find('list');
		$items = $this->Intervencione->Item->find('list');
		$estados = $this->Intervencione->Estado->find('list');
		$this->set(compact('coeficientes', 'items', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Intervencione->exists($id)) {
			throw new NotFoundException(__('Invalid intervencione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Intervencione->save($this->request->data)) {
				$this->Session->setFlash(__('The intervencione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The intervencione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Intervencione.' . $this->Intervencione->primaryKey => $id));
			$this->request->data = $this->Intervencione->find('first', $options);
		}
		$coeficientes = $this->Intervencione->Coeficiente->find('list');
		$items = $this->Intervencione->Item->find('list');
		$estados = $this->Intervencione->Estado->find('list');
		$this->set(compact('coeficientes', 'items', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Intervencione->id = $id;
		if (!$this->Intervencione->exists()) {
			throw new NotFoundException(__('Invalid intervencione'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Intervencione->delete()) {
			$this->Session->setFlash(__('The intervencione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The intervencione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
