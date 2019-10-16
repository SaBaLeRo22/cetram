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
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Paso.id' => 'asc'
			)
		);
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
			throw new NotFoundException(__('No existe paso asociado.'));
		}
		$this->Paso->recursive = 2;
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

			$this->request->data['Paso']['estado_id'] = '1';
			$this->request->data['Paso']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Paso']['user_modified'] = $this->Authake->getUserId();

			if ($this->Paso->save($this->request->data)) {
				$this->Session->setFlash(__('El paso fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El paso no se puede registrar.'));
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
			throw new NotFoundException(__('No existe paso asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Paso']['user_modified'] = $this->Authake->getUserId();

			if ($this->Paso->save($this->request->data)) {
				$this->Session->setFlash(__('El paso fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El paso no se pudo editar.'));
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
			throw new NotFoundException(__('No existe paso asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Paso->delete()) {
			$this->Session->setFlash(__('El paso fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El paso no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Paso->id = $id;
		if (!$this->Paso->exists()) {
			throw new NotFoundException(__('No existe paso asociado.'));
		}

		$this->request->data['Paso']['estado_id'] = '2';
		$this->request->data['Paso']['user_modified'] = $this->Authake->getUserId();

		if ($this->Paso->save($this->request->data)) {
			$this->Session->setFlash(__('El paso fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El paso no se puede eliminar.'));
		}
	}
}
