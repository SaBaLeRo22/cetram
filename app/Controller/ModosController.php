<?php
App::uses('AppController', 'Controller');
/**
 * Modos Controller
 *
 * @property Modo $Modo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ModosController extends AppController {

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
		$this->Modo->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Modo.nombre' => 'asc'
			)
		);
		$this->set('modos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Modo->exists($id)) {
			throw new NotFoundException(__('No existe modo asociado.'));
		}
		$this->Modo->recursive = 2;
		$options = array('conditions' => array('Modo.' . $this->Modo->primaryKey => $id));
		$this->set('modo', $this->Modo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Modo->create();

			$this->request->data['Modo']['estado_id'] = '1';
			$this->request->data['Modo']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Modo']['user_modified'] = $this->Authake->getUserId();

			if ($this->Modo->save($this->request->data)) {
				$this->Session->setFlash(__('El modo fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El modo no se pudo registrar.'));
			}
		}
		$estados = $this->Modo->Estado->find('list');
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
		if (!$this->Modo->exists($id)) {
			throw new NotFoundException(__('No existe modo asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Modo']['user_modified'] = $this->Authake->getUserId();

			if ($this->Modo->save($this->request->data)) {
				$this->Session->setFlash(__('El modo fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El modo no se pudo registrar.'));
			}
		} else {
			$options = array('conditions' => array('Modo.' . $this->Modo->primaryKey => $id));
			$this->request->data = $this->Modo->find('first', $options);
		}
		$estados = $this->Modo->Estado->find('list');
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
		$this->Modo->id = $id;
		if (!$this->Modo->exists()) {
			throw new NotFoundException(__('No existe modo asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Modo->delete()) {
			$this->Session->setFlash(__('El modo fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El modo no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Modo->id = $id;
		if (!$this->Modo->exists()) {
			throw new NotFoundException(__('No existe modo asociado.'));
		}

		$this->request->data['Modo']['estado_id'] = '2';
		$this->request->data['Modo']['user_modified'] = $this->Authake->getUserId();

		if ($this->Modo->save($this->request->data)) {
			$this->Session->setFlash(__('El modo fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El modo no se pudo eliminar.'));
		}
	}
}
