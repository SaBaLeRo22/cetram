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
			throw new NotFoundException(__('No existe evento asociado.'));
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

			$this->request->data['Evento']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Evento']['user_modified'] = $this->Authake->getUserId();

			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('El evento fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El evento no se pudo registrar.'));
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
			throw new NotFoundException(__('No existe evento asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Evento']['user_modified'] = $this->Authake->getUserId();

			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('El evento fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El evento no se pudo editar.'));
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
			throw new NotFoundException(__('No existe evento asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Evento->delete()) {
			$this->Session->setFlash(__('El evento fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El evento no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


}
