<?php
App::uses('AppController', 'Controller');
/**
 * Tipos Controller
 *
 * @property Tipo $Tipo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TiposController extends AppController {

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
		$this->Tipo->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Tipo.nombre' => 'asc'
			)
		);
		$this->set('tipos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('No existe tipo asociado.'));
		}
		$this->Tipo->recursive = 2;
		$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
		$this->set('tipo', $this->Tipo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipo->create();

			$this->request->data['Tipo']['estado_id'] = '1';
			$this->request->data['Tipo']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Tipo']['user_modified'] = $this->Authake->getUserId();

			if ($this->Tipo->save($this->request->data)) {
				$this->Session->setFlash(__('El tipo fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El tipo no se pudo registrar.'));
			}
		}
		$unidades = $this->Tipo->Unidade->find('list');
		$estados = $this->Tipo->Estado->find('list');
		$this->set(compact('unidades','estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('No existe tipo asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Tipo']['user_modified'] = $this->Authake->getUserId();

			if ($this->Tipo->save($this->request->data)) {
				$this->Session->setFlash(__('El tipo fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El tipo no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
			$this->request->data = $this->Tipo->find('first', $options);
		}
		$unidades = $this->Tipo->Unidade->find('list');
		$estados = $this->Tipo->Estado->find('list');
		$this->set(compact('unidades','estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tipo->id = $id;
		if (!$this->Tipo->exists()) {
			throw new NotFoundException(__('No existe tipo asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Tipo->delete()) {
			$this->Session->setFlash(__('El tipo fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El tipo no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Tipo->id = $id;
		if (!$this->Tipo->exists()) {
			throw new NotFoundException(__('No existe tipo asociado.'));
		}

		$this->request->data['Tipo']['estado_id'] = '2';
		$this->request->data['Tipo']['user_modified'] = $this->Authake->getUserId();

		if ($this->Tipo->save($this->request->data)) {
			$this->Session->setFlash(__('El tipo fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El tipo no se pudo eliminar.'));
		}
	}
}
