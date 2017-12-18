<?php
App::uses('AppController', 'Controller');
/**
 * Sectores Controller
 *
 * @property Sectore $Sectore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SectoresController extends AppController {

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
		$this->Sectore->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Sectore.nombre' => 'asc'
			)
		);
		$this->set('sectores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sectore->exists($id)) {
			throw new NotFoundException(__('Invalid sectore'));
		}
		$this->Sectore->recursive = 2;
		$options = array('conditions' => array('Sectore.' . $this->Sectore->primaryKey => $id));
		$this->set('sectore', $this->Sectore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sectore->create();

			$this->request->data['Sectore']['estado_id'] = '1';
			$this->request->data['Sectore']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Sectore']['user_modified'] = $this->Authake->getUserId();

			if ($this->Sectore->save($this->request->data)) {
				$this->Session->setFlash(__('The sectore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sectore could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Sectore->Estado->find('list');
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
		if (!$this->Sectore->exists($id)) {
			throw new NotFoundException(__('Invalid sectore'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Sectore']['user_modified'] = $this->Authake->getUserId();

			if ($this->Sectore->save($this->request->data)) {
				$this->Session->setFlash(__('The sectore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sectore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sectore.' . $this->Sectore->primaryKey => $id));
			$this->request->data = $this->Sectore->find('first', $options);
		}
		$estados = $this->Sectore->Estado->find('list');
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
		$this->Sectore->id = $id;
		if (!$this->Sectore->exists()) {
			throw new NotFoundException(__('Invalid sectore'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Sectore->delete()) {
			$this->Session->setFlash(__('The sectore has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sectore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Sectore->id = $id;
		if (!$this->Sectore->exists()) {
			throw new NotFoundException(__('Invalid Sectore'));
		}

		$this->request->data['Sectore']['estado_id'] = '2';
		$this->request->data['Sectore']['user_modified'] = $this->Authake->getUserId();

		if ($this->Sectore->save($this->request->data)) {
			$this->Session->setFlash(__('The Sectore has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The Sectore could not be saved. Please, try again.'));
		}
	}
}
