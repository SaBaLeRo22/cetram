<?php
App::uses('AppController', 'Controller');
/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CategoriasController extends AppController {

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
		$this->Categoria->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Categoria.nombre' => 'asc'
			)
		);
		$this->set('categorias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('No existe categoria asociada.'));
		}
		$this->Categoria->recursive = 2;
		$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
		$this->set('categoria', $this->Categoria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Categoria->create();

			$this->request->data['Categoria']['estado_id'] = '1';
			$this->request->data['Categoria']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Categoria']['user_modified'] = $this->Authake->getUserId();

			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('La categoria fue registrada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La categoria no se pudo registrar.'));
			}
		}
		$estados = $this->Categoria->Estado->find('list');
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
		if (!$this->Categoria->exists($id)) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Categoria']['user_modified'] = $this->Authake->getUserId();

			if ($this->Categoria->save($this->request->data)) {
				$this->Session->setFlash(__('La categoria fue editada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La categoria no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Categoria.' . $this->Categoria->primaryKey => $id));
			$this->request->data = $this->Categoria->find('first', $options);
		}
		$estados = $this->Categoria->Estado->find('list');
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
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Invalid categoria'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Categoria->delete()) {
			$this->Session->setFlash(__('La categoria fue eliminada.'));
		} else {
			$this->Session->setFlash(__('La categoria no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Categoria->id = $id;
		if (!$this->Categoria->exists()) {
			throw new NotFoundException(__('Invalid Categoria'));
		}

		$this->request->data['Categoria']['estado_id'] = '2';
		$this->request->data['Categoria']['user_modified'] = $this->Authake->getUserId();

		if ($this->Categoria->save($this->request->data)) {
			$this->Session->setFlash(__('La categoria fue eliminada.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('La categoria no se pudo eliminar.'));
		}
	}
}
