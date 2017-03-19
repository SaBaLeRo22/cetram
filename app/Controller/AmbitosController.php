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
			throw new NotFoundException(__('Invalid ambito'));
		}
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
			if ($this->Ambito->save($this->request->data)) {
				$this->Session->setFlash(__('The ambito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ambito could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid ambito'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ambito->save($this->request->data)) {
				$this->Session->setFlash(__('The ambito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ambito could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid ambito'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ambito->delete()) {
			$this->Session->setFlash(__('The ambito has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ambito could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
