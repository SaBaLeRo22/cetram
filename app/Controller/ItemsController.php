<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ItemsController extends AppController {

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
		$this->Item->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Item.nombre' => 'asc'
			)
		);
		$this->set('items', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('No existe item asociado.'));
		}
		$this->Item->recursive = 2;
		$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
		$this->set('item', $this->Item->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Item->create();

			$this->request->data['Item']['estado_id'] = '1';
			$this->request->data['Item']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Item']['user_modified'] = $this->Authake->getUserId();

			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('El item fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El item no se pudo registrar.'));
			}
		}
		$tipos = $this->Item->Tipo->find('list');
		$unidades = $this->Item->Unidade->find('list');
		$estados = $this->Item->Estado->find('list');
		$this->set(compact('unidades','tipos', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('No existe item asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Item']['user_modified'] = $this->Authake->getUserId();

			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('El item fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El item no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
		$tipos = $this->Item->Tipo->find('list');
		$unidades = $this->Item->Unidade->find('list');
		$estados = $this->Item->Estado->find('list');
		$this->set(compact('unidades','tipos', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('No existe item asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Item->delete()) {
			$this->Session->setFlash(__('El item fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El item no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('No existe item asociado.'));
		}

		$this->request->data['Item']['estado_id'] = '2';
		$this->request->data['Item']['user_modified'] = $this->Authake->getUserId();

		if ($this->Item->save($this->request->data)) {
			$this->Session->setFlash(__('El item fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El item no se pudo eliminar.'));
		}
	}
}
