<?php
App::uses('AppController', 'Controller');
/**
 * Convenios Controller
 *
 * @property Convenio $Convenio
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ConveniosController extends AppController {

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
		$this->Convenio->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Convenio.anio' => 'asc'
			)
		);
		$this->set('convenios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Convenio->exists($id)) {
			throw new NotFoundException(__('No existe convenio asociado.'));
		}
		$this->Convenio->recursive = 2;
		$options = array('conditions' => array('Convenio.' . $this->Convenio->primaryKey => $id));
		$this->set('convenio', $this->Convenio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Convenio->create();

			$this->request->data['Convenio']['estado_id'] = '1';
			$this->request->data['Convenio']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Convenio']['user_modified'] = $this->Authake->getUserId();

			if ($this->Convenio->save($this->request->data)) {
				$this->Session->setFlash(__('El convenio fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El convenio no se pudo registrar.'));
			}
		}
		$estados = $this->Convenio->Estado->find('list');
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
		if (!$this->Convenio->exists($id)) {
			throw new NotFoundException(__('No existe convenio asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Convenio']['user_modified'] = $this->Authake->getUserId();

			if ($this->Convenio->save($this->request->data)) {
				$this->Session->setFlash(__('El convenio fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El convenio no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Convenio.' . $this->Convenio->primaryKey => $id));
			$this->request->data = $this->Convenio->find('first', $options);
		}
		$estados = $this->Convenio->Estado->find('list');
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
		$this->Convenio->id = $id;
		if (!$this->Convenio->exists()) {
			throw new NotFoundException(__('Invalid convenio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Convenio->delete()) {
			$this->Session->setFlash(__('El convenio fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El convenio no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Convenio->id = $id;
		if (!$this->Convenio->exists()) {
			throw new NotFoundException(__('No existe convenio asociado.'));
		}

		$this->request->data['Convenio']['estado_id'] = '2';
		$this->request->data['Convenio']['user_modified'] = $this->Authake->getUserId();

		if ($this->Convenio->save($this->request->data)) {
			$this->Session->setFlash(__('El convenio fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El convenio no se pudo eliminar.'));
		}
	}
}
