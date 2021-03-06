<?php
App::uses('AppController', 'Controller');
/**
 * Ambitos Controller
 *
 * @property Ambito $Ambito
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AmbitosController extends AppController {

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
		$this->Ambito->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Ambito.nombre' => 'asc'
			)
		);
		$this->set('ambitos', $this->Paginator->paginate());

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ambito->exists($id)) {
			throw new NotFoundException(__('No existe ambito asociado.'));
		}
		$this->Parametro->recursive = 2;
		$options = array('conditions' => array('Ambito.' . $this->Ambito->primaryKey => $id));
		$this->set('ambito', $this->Ambito->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ambito->create();

			$this->request->data['Ambito']['estado_id'] = '1';
			$this->request->data['Ambito']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Ambito']['user_modified'] = $this->Authake->getUserId();

			if ($this->Ambito->save($this->request->data)) {
				$this->Session->setFlash(__('El ambito fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El ambito no se pudo registrar.'));
			}
		}
		$estados = $this->Ambito->Estado->find('list');
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
		if (!$this->Ambito->exists($id)) {
			throw new NotFoundException(__('No existe ambito asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Ambito']['user_modified'] = $this->Authake->getUserId();

			if ($this->Ambito->save($this->request->data)) {
				$this->Session->setFlash(__('El ambito fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El ambito no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Ambito.' . $this->Ambito->primaryKey => $id));
			$this->request->data = $this->Ambito->find('first', $options);
		}
		$estados = $this->Ambito->Estado->find('list');
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
		$this->Ambito->id = $id;
		if (!$this->Ambito->exists()) {
			throw new NotFoundException(__('No existe ambito asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ambito->delete()) {
			$this->Session->setFlash(__('El ambito fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El ambito no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Ambito->id = $id;
		if (!$this->Ambito->exists()) {
			throw new NotFoundException(__('Invalid Ambito'));
		}

		$this->request->data['Ambito']['estado_id'] = '2';
		$this->request->data['Ambito']['user_modified'] = $this->Authake->getUserId();

		if ($this->Ambito->save($this->request->data)) {
			$this->Session->setFlash(__('El ambito fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El ambito no se pudo eliminar.'));
		}
	}
}
