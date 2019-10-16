<?php
App::uses('AppController', 'Controller');
/**
 * Dietas Controller
 *
 * @property Dieta $Dieta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DietasController extends AppController {

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
		$this->Dieta->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Dieta.nombre' => 'asc'
			)
		);
		$this->set('dietas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dieta->exists($id)) {
			throw new NotFoundException(__('No existe dieta asociada.'));
		}
		$this->Dieta->recursive = 2;
		$options = array('conditions' => array('Dieta.' . $this->Dieta->primaryKey => $id));
		$this->set('dieta', $this->Dieta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dieta->create();

			$this->request->data['Dieta']['estado_id'] = '1';
			$this->request->data['Dieta']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Dieta']['user_modified'] = $this->Authake->getUserId();

			if ($this->Dieta->save($this->request->data)) {
				$this->Session->setFlash(__('La dieta fue registrada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La dieta no se pudo registrar.'));
			}
		}
		$estados = $this->Dieta->Estado->find('list');
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
		if (!$this->Dieta->exists($id)) {
			throw new NotFoundException(__('No existe dieta asociada.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Dieta']['user_modified'] = $this->Authake->getUserId();

			if ($this->Dieta->save($this->request->data)) {
				$this->Session->setFlash(__('La dieta fue editada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La dieta no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Dieta.' . $this->Dieta->primaryKey => $id));
			$this->request->data = $this->Dieta->find('first', $options);
		}
		$estados = $this->Dieta->Estado->find('list');
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
		$this->Dieta->id = $id;
		if (!$this->Dieta->exists()) {
			throw new NotFoundException(__('Invalid dieta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dieta->delete()) {
			$this->Session->setFlash(__('La dieta fue eliminada.'));
		} else {
			$this->Session->setFlash(__('La dieta no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Dieta->id = $id;
		if (!$this->Dieta->exists()) {
			throw new NotFoundException(__('Invalid Dieta'));
		}

		$this->request->data['Dieta']['estado_id'] = '2';
		$this->request->data['Dieta']['user_modified'] = $this->Authake->getUserId();

		if ($this->Dieta->save($this->request->data)) {
			$this->Session->setFlash(__('La dieta fue eliminada.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('La dieta no se pudo eliminar.'));
		}
	}
}
