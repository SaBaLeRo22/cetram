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
}
