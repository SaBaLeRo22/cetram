<?php
App::uses('AppController', 'Controller');
/**
 * Alertas Controller
 *
 * @property Alerta $Alerta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlertasController extends AppController {

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
		$this->Alerta->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Alerta.nombre' => 'asc'
			)
		);
		$this->set('alertas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Alerta->exists($id)) {
			throw new NotFoundException(__('Invalid alerta'));
		}
		$this->Alerta->recursive = 2;
		$options = array('conditions' => array('Alerta.' . $this->Alerta->primaryKey => $id));
		$this->set('alerta', $this->Alerta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Alerta->create();

			$this->request->data['Alerta']['estado_id'] = '1';
			$this->request->data['Alerta']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Alerta']['user_modified'] = $this->Authake->getUserId();

			if ($this->Alerta->save($this->request->data)) {
				$this->Session->setFlash(__('The alerta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alerta could not be saved. Please, try again.'));
			}
		}
		$indicadores = $this->Alerta->Indicadore->find('list');
		$eventos = $this->Alerta->Evento->find('list');
		$estados = $this->Alerta->Estado->find('list');
		$this->set(compact('indicadores', 'eventos', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Alerta->exists($id)) {
			throw new NotFoundException(__('Invalid alerta'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Alerta']['user_modified'] = $this->Authake->getUserId();

			if ($this->Alerta->save($this->request->data)) {
				$this->Session->setFlash(__('The alerta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alerta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Alerta.' . $this->Alerta->primaryKey => $id));
			$this->request->data = $this->Alerta->find('first', $options);
		}
		$indicadores = $this->Alerta->Indicadore->find('list');
		$eventos = $this->Alerta->Evento->find('list');
		$estados = $this->Alerta->Estado->find('list');
		$this->set(compact('indicadores', 'eventos', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Alerta->id = $id;
		if (!$this->Alerta->exists()) {
			throw new NotFoundException(__('Invalid alerta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Alerta->delete()) {
			$this->Session->setFlash(__('The alerta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alerta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Alerta->id = $id;
		if (!$this->Alerta->exists()) {
			throw new NotFoundException(__('Invalid Alerta'));
		}

		$this->request->data['Alerta']['estado_id'] = '2';
		$this->request->data['Alerta']['user_modified'] = $this->Authake->getUserId();

		if ($this->Alerta->save($this->request->data)) {
			$this->Session->setFlash(__('The Alerta has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The Alerta could not be saved. Please, try again.'));
		}
	}
}
