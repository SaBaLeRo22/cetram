<?php
App::uses('AppController', 'Controller');
/**
 * Indicadores Controller
 *
 * @property Indicadore $Indicadore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class IndicadoresController extends AppController {

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
		$this->Indicadore->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Indicadore.nombre' => 'asc'
			)
		);
		$this->set('indicadores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Indicadore->exists($id)) {
			throw new NotFoundException(__('No existe indicador asociado.'));
		}
		$this->Indicadore->recursive = 2;
		$options = array('conditions' => array('Indicadore.' . $this->Indicadore->primaryKey => $id));
		$this->set('indicadore', $this->Indicadore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Indicadore->create();

			$this->request->data['Indicadore']['estado_id'] = '1';
			$this->request->data['Indicadore']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Indicadore']['user_modified'] = $this->Authake->getUserId();

			if ($this->Indicadore->save($this->request->data)) {
				$this->Session->setFlash(__('El indicador fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El indicador no se pudo registrar.'));
			}
		}
		$unidades = $this->Indicadore->Unidade->find('list');
		$ambitos = $this->Indicadore->Ambito->find('list');
		$estados = $this->Indicadore->Estado->find('list');
		$this->set(compact('unidades', 'ambitos', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Indicadore->exists($id)) {
			throw new NotFoundException(__('No existe indicador asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Indicadore']['user_modified'] = $this->Authake->getUserId();

			if ($this->Indicadore->save($this->request->data)) {
				$this->Session->setFlash(__('El indicador fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El indicador no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Indicadore.' . $this->Indicadore->primaryKey => $id));
			$this->request->data = $this->Indicadore->find('first', $options);
		}
		$unidades = $this->Indicadore->Unidade->find('list');
		$ambitos = $this->Indicadore->Ambito->find('list');
		$estados = $this->Indicadore->Estado->find('list');
		$this->set(compact('unidades', 'ambitos', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Indicadore->id = $id;
		if (!$this->Indicadore->exists()) {
			throw new NotFoundException(__('No existe indicador asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Indicadore->delete()) {
			$this->Session->setFlash(__('El indicador fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El indicador no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Indicadore->id = $id;
		if (!$this->Indicadore->exists()) {
			throw new NotFoundException(__('No existe indicador asociado.'));
		}

		$this->request->data['Indicadore']['estado_id'] = '2';
		$this->request->data['Indicadore']['user_modified'] = $this->Authake->getUserId();

		if ($this->Indicadore->save($this->request->data)) {
			$this->Session->setFlash(__('El indicador fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El indicador no se pudo eliminar.'));
		}
	}
}
