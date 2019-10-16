<?php
App::uses('AppController', 'Controller');
/**
 * Estados Controller
 *
 * @property Estado $Estado
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EstadosController extends AppController {

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
		$this->Estado->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Estado.nombre' => 'asc'
			)
		);
		$this->set('estados', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Estado->exists($id)) {
			throw new NotFoundException(__('No existe estado asociado.'));
		}
		$this->Estado->recursive = 0;
		$options = array('conditions' => array('Estado.' . $this->Estado->primaryKey => $id));
		$this->set('estado', $this->Estado->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Estado->create();

			$this->request->data['Estado']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Estado']['user_modified'] = $this->Authake->getUserId();

			if ($this->Estado->save($this->request->data)) {
				$this->Session->setFlash(__('El estado fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El estado no se pudo registrar.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Estado->exists($id)) {
			throw new NotFoundException(__('No existe estado asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Estado']['user_modified'] = $this->Authake->getUserId();

			if ($this->Estado->save($this->request->data)) {
				$this->Session->setFlash(__('El estado fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El estado no se pudo registrar.'));
			}
		} else {
			$options = array('conditions' => array('Estado.' . $this->Estado->primaryKey => $id));
			$this->request->data = $this->Estado->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException(__('No existe estado asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Estado->delete()) {
			$this->Session->setFlash(__('El estado fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El estado no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
