<?php
App::uses('AppController', 'Controller');
/**
 * Unidades Controller
 *
 * @property Unidade $Unidade
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UnidadesController extends AppController {

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
		$this->Unidade->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Unidade.nombre' => 'asc'
			)
		);
		$this->set('unidades', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Unidade->exists($id)) {
			throw new NotFoundException(__('No existe unidad asociada.'));
		}
		$this->Unidade->recursive = 0;
		$options = array('conditions' => array('Unidade.' . $this->Unidade->primaryKey => $id));
		$this->set('unidade', $this->Unidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Unidade->create();

			$this->request->data['Unidade']['estado_id'] = '1';
			$this->request->data['Unidade']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Unidade']['user_modified'] = $this->Authake->getUserId();

			if ($this->Unidade->save($this->request->data)) {
				$this->Session->setFlash(__('La unidad fue registrada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La unidad no se pudo registrar.'));
			}
		}
		$estados = $this->Unidade->Estado->find('list');
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
		if (!$this->Unidade->exists($id)) {
			throw new NotFoundException(__('No existe unidad asociada.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Unidade']['user_modified'] = $this->Authake->getUserId();

			if ($this->Unidade->save($this->request->data)) {
				$this->Session->setFlash(__('La unidad fue editada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La unidad no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Unidade.' . $this->Unidade->primaryKey => $id));
			$this->request->data = $this->Unidade->find('first', $options);
		}
		$estados = $this->Unidade->Estado->find('list');
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
		$this->Unidade->id = $id;
		if (!$this->Unidade->exists()) {
			throw new NotFoundException(__('No existe unidad asociada.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Unidade->delete()) {
			$this->Session->setFlash(__('La unidad fue eliminada.'));
		} else {
			$this->Session->setFlash(__('La unidad no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Unidade->id = $id;
		if (!$this->Unidade->exists()) {
			throw new NotFoundException(__('No existe unidad asociada.'));
		}

		$this->request->data['Unidade']['estado_id'] = '2';
		$this->request->data['Unidade']['user_modified'] = $this->Authake->getUserId();

		if ($this->Unidade->save($this->request->data)) {
			$this->Session->setFlash(__('La unidad fue eliminada.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('La unidad no se pudo eliminar.'));
		}
	}
}
