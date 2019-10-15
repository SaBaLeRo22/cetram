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
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Agrupamiento.orden' => 'asc'
			)
		);
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
			throw new NotFoundException(__('No existe agrupamiento asociado.'));
		}
		$this->Agrupamiento->recursive = 2;
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

			$this->request->data['Agrupamiento']['estado_id'] = '1';
			$this->request->data['Agrupamiento']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Agrupamiento']['user_modified'] = $this->Authake->getUserId();

			if ($this->Agrupamiento->save($this->request->data)) {
				$this->Session->setFlash(__('El agrupamiento fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El agrupamiento no se pudo registrar.'));
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
			throw new NotFoundException(__('No existe agrupamiento asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Agrupamiento']['user_modified'] = $this->Authake->getUserId();

			if ($this->Agrupamiento->save($this->request->data)) {
				$this->Session->setFlash(__('El agrupamiento fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El agrupamiento no se pudo editar.'));
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
			throw new NotFoundException(__('No existe agrupamiento asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Agrupamiento->delete()) {
			$this->Session->setFlash(__('El agrupamiento fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El agrupamiento no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Agrupamiento->id = $id;
		if (!$this->Agrupamiento->exists()) {
			throw new NotFoundException(__('No existe agrupamiento asociado.'));
		}

		$this->request->data['Agrupamiento']['estado_id'] = '2';
		$this->request->data['Agrupamiento']['user_modified'] = $this->Authake->getUserId();

		if ($this->Agrupamiento->save($this->request->data)) {
			$this->Session->setFlash(__('El agrupamiento fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El agrupamiento no se pudo eliminar.'));
		}
	}
}
