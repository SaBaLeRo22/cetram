<?php
App::uses('AppController', 'Controller');
/**
 * Matrices Controller
 *
 * @property Matrix $Matrix
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MatricesController extends AppController {

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
		$this->Matrix->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Matrix.id' => 'asc'
			)
		);
		$this->set('matrices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Matrix->exists($id)) {
			throw new NotFoundException(__('Invalid matrix'));
		}
		$this->Parametro->recursive = 2;
		$options = array('conditions' => array('Matrix.' . $this->Matrix->primaryKey => $id));
		$this->set('matrix', $this->Matrix->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Matrix->create();

			$this->request->data['Matrix']['estado_id'] = '1';
			$this->request->data['Matrix']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Matrix']['user_modified'] = $this->Authake->getUserId();

			if ($this->Matrix->save($this->request->data)) {
				$this->Session->setFlash(__('The matrix has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matrix could not be saved. Please, try again.'));
			}
		}
		$coeficientes = $this->Matrix->Coeficiente->find('list');
		$multiplicadores = $this->Matrix->Multiplicadore->find('list');
		$estados = $this->Matrix->Estado->find('list');
		$this->set(compact('coeficientes', 'multiplicadores', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Matrix->exists($id)) {
			throw new NotFoundException(__('Invalid matrix'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Matrix']['user_modified'] = $this->Authake->getUserId();

			if ($this->Matrix->save($this->request->data)) {
				$this->Session->setFlash(__('The matrix has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matrix could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Matrix.' . $this->Matrix->primaryKey => $id));
			$this->request->data = $this->Matrix->find('first', $options);
		}
		$coeficientes = $this->Matrix->Coeficiente->find('list');
		$multiplicadores = $this->Matrix->Multiplicadore->find('list');
		$estados = $this->Matrix->Estado->find('list');
		$this->set(compact('coeficientes', 'multiplicadores', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Matrix->id = $id;
		if (!$this->Matrix->exists()) {
			throw new NotFoundException(__('Invalid matrix'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Matrix->delete()) {
			$this->Session->setFlash(__('The matrix has been deleted.'));
		} else {
			$this->Session->setFlash(__('The matrix could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Matrix->id = $id;
		if (!$this->Matrix->exists()) {
			throw new NotFoundException(__('Invalid Matrix'));
		}

		$this->request->data['Matrix']['estado_id'] = '2';
		$this->request->data['Matrix']['user_modified'] = $this->Authake->getUserId();

		if ($this->Matrix->save($this->request->data)) {
			$this->Session->setFlash(__('The Matrix has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The Matrix could not be saved. Please, try again.'));
		}
	}
}
