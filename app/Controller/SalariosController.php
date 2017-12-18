<?php
App::uses('AppController', 'Controller');
/**
 * Salarios Controller
 *
 * @property Salario $Salario
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SalariosController extends AppController {

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
		$this->Salario->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Salario.id' => 'asc'
			)
		);
		$this->set('salarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Salario->exists($id)) {
			throw new NotFoundException(__('Invalid salario'));
		}
		$this->Salario->recursive = 2;
		$options = array('conditions' => array('Salario.' . $this->Salario->primaryKey => $id));
		$this->set('salario', $this->Salario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Salario->create();

			$this->request->data['Salario']['estado_id'] = '1';
			$this->request->data['Salario']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Salario']['user_modified'] = $this->Authake->getUserId();

			if ($this->Salario->save($this->request->data)) {
				$this->Session->setFlash(__('The salario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salario could not be saved. Please, try again.'));
			}
		}
		$convenios = $this->Salario->Convenio->find('list');
		$categorias = $this->Salario->Categoria->find('list');
		$estados = $this->Salario->Estado->find('list');
		$this->set(compact('convenios', 'categorias', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Salario->exists($id)) {
			throw new NotFoundException(__('Invalid salario'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Salario']['user_modified'] = $this->Authake->getUserId();

			if ($this->Salario->save($this->request->data)) {
				$this->Session->setFlash(__('The salario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Salario.' . $this->Salario->primaryKey => $id));
			$this->request->data = $this->Salario->find('first', $options);
		}
		$convenios = $this->Salario->Convenio->find('list');
		$categorias = $this->Salario->Categoria->find('list');
		$estados = $this->Salario->Estado->find('list');
		$this->set(compact('convenios', 'categorias', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Salario->id = $id;
		if (!$this->Salario->exists()) {
			throw new NotFoundException(__('Invalid salario'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Salario->delete()) {
			$this->Session->setFlash(__('The salario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The salario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Salario->id = $id;
		if (!$this->Salario->exists()) {
			throw new NotFoundException(__('Invalid Salario'));
		}

		$this->request->data['Salario']['estado_id'] = '2';
		$this->request->data['Salario']['user_modified'] = $this->Authake->getUserId();

		if ($this->Salario->save($this->request->data)) {
			$this->Session->setFlash(__('The Salario has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The Salario could not be saved. Please, try again.'));
		}
	}
}
