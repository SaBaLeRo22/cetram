<?php
App::uses('AppController', 'Controller');
/**
 * Provincias Controller
 *
 * @property Provincia $Provincia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProvinciasController extends AppController {

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
		$this->Provincia->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Provincia.nombre' => 'asc'
			)
		);
		$this->set('provincias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Provincia->exists($id)) {
			throw new NotFoundException(__('No existe provincia asociada.'));
		}
		$this->Provincia->recursive = 2;
		$options = array('conditions' => array('Provincia.' . $this->Provincia->primaryKey => $id));
		$this->set('provincia', $this->Provincia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Provincia->create();

			$this->request->data['Provincia']['estado_id'] = '1';
			$this->request->data['Provincia']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Provincia']['user_modified'] = $this->Authake->getUserId();

			if ($this->Provincia->save($this->request->data)) {
				$this->Session->setFlash(__('La provincia fue registrada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La provincia no se pudo registrar.'));
			}
		}
		$estados = $this->Provincia->Estado->find('list');
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
		if (!$this->Provincia->exists($id)) {
			throw new NotFoundException(__('No existe provincia asociada.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Provincia']['user_modified'] = $this->Authake->getUserId();

			if ($this->Provincia->save($this->request->data)) {
				$this->Session->setFlash(__('La provincia fue editada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La provincia no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Provincia.' . $this->Provincia->primaryKey => $id));
			$this->request->data = $this->Provincia->find('first', $options);
		}
		$estados = $this->Provincia->Estado->find('list');
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
		$this->Provincia->id = $id;
		if (!$this->Provincia->exists()) {
			throw new NotFoundException(__('No existe provincia asociada.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Provincia->delete()) {
			$this->Session->setFlash(__('La provincia fue eliminada.'));
		} else {
			$this->Session->setFlash(__('La provincia no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Provincia->id = $id;
		if (!$this->Provincia->exists()) {
			throw new NotFoundException(__('No existe provincia asociada.'));
		}

		$this->request->data['Provincia']['estado_id'] = '2';
		$this->request->data['Provincia']['user_modified'] = $this->Authake->getUserId();

		if ($this->Provincia->save($this->request->data)) {
			$this->Session->setFlash(__('La provincia fue eliminada.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('La provincia no se pudo eliminar.'));
		}
	}
}
