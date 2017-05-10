<?php
App::uses('AppController', 'Controller');
/**
 * Coeficientes Controller
 *
 * @property Coeficiente $Coeficiente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoeficientesController extends AppController {

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
		$this->Coeficiente->recursive = 0;
		$this->set('coeficientes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Coeficiente->exists($id)) {
			throw new NotFoundException(__('Invalid coeficiente'));
		}
		$options = array('conditions' => array('Coeficiente.' . $this->Coeficiente->primaryKey => $id));
		$this->set('coeficiente', $this->Coeficiente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Coeficiente->create();
			if ($this->Coeficiente->save($this->request->data)) {
				$this->Session->setFlash(__('The coeficiente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coeficiente could not be saved. Please, try again.'));
			}
		}
		$ambitos = $this->Coeficiente->Ambito->find('list');
		$estados = $this->Coeficiente->Estado->find('list');
		$this->set(compact('ambitos', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Coeficiente->exists($id)) {
			throw new NotFoundException(__('Invalid coeficiente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Coeficiente->save($this->request->data)) {
				$this->Session->setFlash(__('The coeficiente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coeficiente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Coeficiente.' . $this->Coeficiente->primaryKey => $id));
			$this->request->data = $this->Coeficiente->find('first', $options);
		}
		$ambitos = $this->Coeficiente->Ambito->find('list');
		$estados = $this->Coeficiente->Estado->find('list');
		$this->set(compact('ambitos', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Coeficiente->id = $id;
		if (!$this->Coeficiente->exists()) {
			throw new NotFoundException(__('Invalid coeficiente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Coeficiente->delete()) {
			$this->Session->setFlash(__('The coeficiente has been deleted.'));
		} else {
			$this->Session->setFlash(__('The coeficiente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
