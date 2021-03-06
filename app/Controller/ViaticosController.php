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
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Viatico.id' => 'asc'
			)
		);
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
			throw new NotFoundException(__('No existe viatico asociado.'));
		}
		$this->Viatico->recursive = 0;
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

			$this->request->data['Viatico']['estado_id'] = '1';
			$this->request->data['Viatico']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Viatico']['user_modified'] = $this->Authake->getUserId();

			if ($this->Viatico->save($this->request->data)) {
				$this->Session->setFlash(__('El viatico fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El viatico no se pudo registrar.'));
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
			throw new NotFoundException(__('No existe viatico asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Viatico']['user_modified'] = $this->Authake->getUserId();

			if ($this->Viatico->save($this->request->data)) {
				$this->Session->setFlash(__('El viatico fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El viatico no se pudo editar.'));
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
			throw new NotFoundException(__('No existe viatico asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Viatico->delete()) {
			$this->Session->setFlash(__('El viatico fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El viatico no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Viatico->id = $id;
		if (!$this->Viatico->exists()) {
			throw new NotFoundException(__('No existe viatico asociado.'));
		}

		$this->request->data['Viatico']['estado_id'] = '2';
		$this->request->data['Viatico']['user_modified'] = $this->Authake->getUserId();

		if ($this->Viatico->save($this->request->data)) {
			$this->Session->setFlash(__('El viatico fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El viatico no se pudo eliminar.'));
		}
	}
}
