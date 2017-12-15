<?php
App::uses('AppController', 'Controller');
/**
 * Participaciones Controller
 *
 * @property Participacione $Participacione
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ParticipacionesController extends AppController {

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
		$this->Participacione->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Participacione.id' => 'asc'
			)
		);
		$this->set('participaciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Participacione->exists($id)) {
			throw new NotFoundException(__('Invalid participacione'));
		}
		$this->Participacione->recursive = 2;
		$options = array('conditions' => array('Participacione.' . $this->Participacione->primaryKey => $id));
		$this->set('participacione', $this->Participacione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Participacione->create();

			$this->request->data['Participacione']['estado_id'] = '1';
			$this->request->data['Participacione']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Participacione']['user_modified'] = $this->Authake->getUserId();

			if ($this->Participacione->save($this->request->data)) {
				$this->Session->setFlash(__('The participacione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participacione could not be saved. Please, try again.'));
			}
		}
		$parametros = $this->Participacione->Parametro->find('list');
		$items = $this->Participacione->Item->find('list');
		$estados = $this->Participacione->Estado->find('list');
		$this->set(compact('parametros', 'items', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Participacione->exists($id)) {
			throw new NotFoundException(__('Invalid participacione'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Participacione']['user_modified'] = $this->Authake->getUserId();

			if ($this->Participacione->save($this->request->data)) {
				$this->Session->setFlash(__('The participacione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participacione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Participacione.' . $this->Participacione->primaryKey => $id));
			$this->request->data = $this->Participacione->find('first', $options);
		}
		$parametros = $this->Participacione->Parametro->find('list');
		$items = $this->Participacione->Item->find('list');
		$estados = $this->Participacione->Estado->find('list');
		$this->set(compact('parametros', 'items', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Participacione->id = $id;
		if (!$this->Participacione->exists()) {
			throw new NotFoundException(__('Invalid participacione'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Participacione->delete()) {
			$this->Session->setFlash(__('The participacione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The participacione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Participacione->id = $id;
		if (!$this->Participacione->exists()) {
			throw new NotFoundException(__('Invalid Participacione'));
		}

		$this->request->data['Participacione']['estado_id'] = '2';
		$this->request->data['Participacione']['user_modified'] = $this->Authake->getUserId();

		if ($this->Participacione->save($this->request->data)) {
			$this->Session->setFlash(__('The Participacione has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The Participacione could not be saved. Please, try again.'));
		}
	}
}
