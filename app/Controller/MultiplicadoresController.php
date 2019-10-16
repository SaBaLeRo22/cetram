<?php
App::uses('AppController', 'Controller');
/**
 * Multiplicadores Controller
 *
 * @property Multiplicadore $Multiplicadore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MultiplicadoresController extends AppController {

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
		$this->Multiplicadore->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Multiplicadore.nombre' => 'asc'
			)
		);
		$this->set('multiplicadores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Multiplicadore->exists($id)) {
			throw new NotFoundException(__('No existe multiplicador asociado.'));
		}
		$this->Multiplicadore->recursive = 2;
		$options = array('conditions' => array('Multiplicadore.' . $this->Multiplicadore->primaryKey => $id));
		$this->set('multiplicadore', $this->Multiplicadore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Multiplicadore->create();

			$this->request->data['Multiplicadore']['estado_id'] = '1';
			$this->request->data['Multiplicadore']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Multiplicadore']['user_modified'] = $this->Authake->getUserId();

			if ($this->Multiplicadore->save($this->request->data)) {
				$this->Session->setFlash(__('El multiplicador fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El multiplicador no se pudo registrar.'));
			}
		}
		$estados = $this->Multiplicadore->Estado->find('list');
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
		if (!$this->Multiplicadore->exists($id)) {
			throw new NotFoundException(__('No existe multiplicador asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Multiplicadore']['user_modified'] = $this->Authake->getUserId();

			if ($this->Multiplicadore->save($this->request->data)) {
				$this->Session->setFlash(__('El multiplicador fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El multiplicador no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Multiplicadore.' . $this->Multiplicadore->primaryKey => $id));
			$this->request->data = $this->Multiplicadore->find('first', $options);
		}
		$estados = $this->Multiplicadore->Estado->find('list');
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
		$this->Multiplicadore->id = $id;
		if (!$this->Multiplicadore->exists()) {
			throw new NotFoundException(__('No existe multiplicador asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Multiplicadore->delete()) {
			$this->Session->setFlash(__('El multiplicador fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El multiplicador no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Multiplicadore->id = $id;
		if (!$this->Multiplicadore->exists()) {
			throw new NotFoundException(__('No existe multiplicador asociado.'));
		}

		$this->request->data['Multiplicadore']['estado_id'] = '2';
		$this->request->data['Multiplicadore']['user_modified'] = $this->Authake->getUserId();

		if ($this->Multiplicadore->save($this->request->data)) {
			$this->Session->setFlash(__('El multiplicador fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El multiplicador no se pudo eliminar.'));
		}
	}
}
