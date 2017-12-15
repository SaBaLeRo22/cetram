<?php
App::uses('AppController', 'Controller');
/**
 * Opciones Controller
 *
 * @property Opcione $Opcione
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OpcionesController extends AppController {

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
		$this->Opcione->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Opcione.nombre' => 'asc'
			)
		);
		$this->set('opciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Opcione->exists($id)) {
			throw new NotFoundException(__('Invalid opcione'));
		}
		$this->Opcione->recursive = 2;
		$options = array('conditions' => array('Opcione.' . $this->Opcione->primaryKey => $id));
		$this->set('opcione', $this->Opcione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Opcione->create();

			$this->request->data['Opcione']['estado_id'] = '1';
			$this->request->data['Opcione']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Opcione']['user_modified'] = $this->Authake->getUserId();

			if ($this->Opcione->save($this->request->data)) {
				$this->Session->setFlash(__('The opcione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opcione could not be saved. Please, try again.'));
			}
		}
		$preguntas = $this->Opcione->Pregunta->find('list');
		$unidades = $this->Opcione->Unidade->find('list');
		$estados = $this->Opcione->Estado->find('list');
		$this->set(compact('preguntas', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Opcione->exists($id)) {
			throw new NotFoundException(__('Invalid opcione'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Opcione']['user_modified'] = $this->Authake->getUserId();

			if ($this->Opcione->save($this->request->data)) {
				$this->Session->setFlash(__('The opcione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opcione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Opcione.' . $this->Opcione->primaryKey => $id));
			$this->request->data = $this->Opcione->find('first', $options);
		}
		$preguntas = $this->Opcione->Pregunta->find('list');
		$unidades = $this->Opcione->Unidade->find('list');
		$estados = $this->Opcione->Estado->find('list');
		$this->set(compact('preguntas', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Opcione->id = $id;
		if (!$this->Opcione->exists()) {
			throw new NotFoundException(__('Invalid opcione'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Opcione->delete()) {
			$this->Session->setFlash(__('The opcione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The opcione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Opcione->id = $id;
		if (!$this->Opcione->exists()) {
			throw new NotFoundException(__('Invalid Opcione'));
		}

		$this->request->data['Opcione']['estado_id'] = '2';
		$this->request->data['Opcione']['user_modified'] = $this->Authake->getUserId();

		if ($this->Opcione->save($this->request->data)) {
			$this->Session->setFlash(__('The Opcione has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The Opcione could not be saved. Please, try again.'));
		}
	}
}
