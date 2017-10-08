<?php
App::uses('AppController', 'Controller');
/**
 * Parametros Controller
 *
 * @property Parametro $Parametro
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ParametrosController extends AppController {

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
		$this->Parametro->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Parametro.nombre' => 'asc'
			)
		);
		$this->set('parametros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parametro->exists($id)) {
			throw new NotFoundException(__('Invalid parametro'));
		}
		$this->Parametro->recursive = 2;
		$options = array('conditions' => array('Parametro.' . $this->Parametro->primaryKey => $id));
		$this->set('parametro', $this->Parametro->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Parametro->create();

			$this->request->data['Parametro']['estado_id'] = '1';
			$this->request->data['Parametro']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Parametro']['user_modified'] = $this->Authake->getUserId();

			if ($this->Parametro->save($this->request->data)) {
				$this->Session->setFlash(__('The parametro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parametro could not be saved. Please, try again.'));
			}
		}
		$unidades = $this->Parametro->Unidade->find('list');
		$tipos = $this->Parametro->Tipo->find('list');
		$ambitos = $this->Parametro->Ambito->find('list');
		$estados = $this->Parametro->Estado->find('list');
		$this->set(compact('unidades', 'tipos', 'ambitos', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Parametro->exists($id)) {
			throw new NotFoundException(__('Invalid parametro'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Parametro']['user_modified'] = $this->Authake->getUserId();

			if ($this->Parametro->save($this->request->data)) {
				$this->Session->setFlash(__('The parametro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parametro could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Parametro.' . $this->Parametro->primaryKey => $id));
			$this->request->data = $this->Parametro->find('first', $options);
		}
		$unidades = $this->Parametro->Unidade->find('list');
		$tipos = $this->Parametro->Tipo->find('list');
		$ambitos = $this->Parametro->Ambito->find('list');
		$estados = $this->Parametro->Estado->find('list');
		$this->set(compact('unidades', 'tipos', 'ambitos', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Parametro->id = $id;
		if (!$this->Parametro->exists()) {
			throw new NotFoundException(__('Invalid parametro'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Parametro->delete()) {
			$this->Session->setFlash(__('The parametro has been deleted.'));
		} else {
			$this->Session->setFlash(__('The parametro could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Parametro->id = $id;
		if (!$this->Parametro->exists()) {
			throw new NotFoundException(__('Invalid Parametro'));
		}

		$this->request->data['Parametro']['estado_id'] = '2';
		$this->request->data['Parametro']['user_modified'] = $this->Authake->getUserId();

		if ($this->Parametro->save($this->request->data)) {
			$this->Session->setFlash(__('The Parametro has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The pregunta could not be saved. Please, try again.'));
		}
	}
}
