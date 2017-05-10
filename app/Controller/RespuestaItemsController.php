<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaItems Controller
 *
 * @property RespuestaItem $RespuestaItem
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaItemsController extends AppController {

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
		$this->RespuestaItem->recursive = 0;
		$this->set('respuestaItems', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaItem->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta item'));
		}
		$options = array('conditions' => array('RespuestaItem.' . $this->RespuestaItem->primaryKey => $id));
		$this->set('respuestaItem', $this->RespuestaItem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaItem->create();
			if ($this->RespuestaItem->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta item could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaItem->Consultum->find('list');
		$items = $this->RespuestaItem->Item->find('list');
		$unidades = $this->RespuestaItem->Unidade->find('list');
		$estados = $this->RespuestaItem->Estado->find('list');
		$this->set(compact('consultas', 'items', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaItem->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaItem->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaItem.' . $this->RespuestaItem->primaryKey => $id));
			$this->request->data = $this->RespuestaItem->find('first', $options);
		}
		$consultas = $this->RespuestaItem->Consultum->find('list');
		$items = $this->RespuestaItem->Item->find('list');
		$unidades = $this->RespuestaItem->Unidade->find('list');
		$estados = $this->RespuestaItem->Estado->find('list');
		$this->set(compact('consultas', 'items', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaItem->id = $id;
		if (!$this->RespuestaItem->exists()) {
			throw new NotFoundException(__('Invalid respuesta item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaItem->delete()) {
			$this->Session->setFlash(__('The respuesta item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
