<?php
App::uses('AppController', 'Controller');
/**
 * Eventos Controller
 *
 * @property Evento $Evento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EventosController extends AppController {

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
		$this->Evento->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Evento.nombre' => 'asc'
			)
		);
		$this->set('eventos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Evento->exists($id)) {
			throw new NotFoundException(__('Invalid evento'));
		}
		$this->Evento->recursive = 2;
		$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $id));
		$this->set('evento', $this->Evento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Evento->create();

			$this->request->data['Evento']['estado_id'] = '1';
			$this->request->data['Evento']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Evento']['user_modified'] = $this->Authake->getUserId();

			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('The evento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evento could not be saved. Please, try again.'));
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
		if (!$this->Evento->exists($id)) {
			throw new NotFoundException(__('Invalid evento'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Evento']['user_modified'] = $this->Authake->getUserId();

			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('The evento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $id));
			$this->request->data = $this->Evento->find('first', $options);
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
		$this->Evento->id = $id;
		if (!$this->Evento->exists()) {
			throw new NotFoundException(__('Invalid evento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Evento->delete()) {
			$this->Session->setFlash(__('The evento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The evento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Evento->id = $id;
		if (!$this->Evento->exists()) {
			throw new NotFoundException(__('Invalid Evento'));
		}

		$this->request->data['Evento']['estado_id'] = '2';
		$this->request->data['Evento']['user_modified'] = $this->Authake->getUserId();

		if ($this->Evento->save($this->request->data)) {
			$this->Session->setFlash(__('The Evento has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The Evento could not be saved. Please, try again.'));
		}
	}
}
