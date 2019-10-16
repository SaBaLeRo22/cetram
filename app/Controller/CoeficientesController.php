<?php
App::uses('AppController', 'Controller');
/**
 * Coeficientes Controller
 *
 * @property Coeficiente $Coeficiente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoeficientesController extends AppController {

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
		$this->Coeficiente->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Coeficiente.nombre' => 'asc'
			)
		);
		$this->set('coeficientes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Coeficiente->exists($id)) {
			throw new NotFoundException(__('No existe coeficiente asociado.'));
		}
		$this->Coeficiente->recursive = 2;
		$options = array('conditions' => array('Coeficiente.' . $this->Coeficiente->primaryKey => $id));
		$this->set('coeficiente', $this->Coeficiente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Coeficiente->create();

			$this->request->data['Coeficiente']['estado_id'] = '1';
			$this->request->data['Coeficiente']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Coeficiente']['user_modified'] = $this->Authake->getUserId();

			if ($this->Coeficiente->save($this->request->data)) {
				$this->Session->setFlash(__('El coeficiente fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El coeficiente no se pudo registrar.'));
			}
		}
		$ambitos = $this->Coeficiente->Ambito->find('list');
		$estados = $this->Coeficiente->Estado->find('list');
		$this->set(compact('ambitos', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Coeficiente->exists($id)) {
			throw new NotFoundException(__('No existe coeficiente asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Coeficiente']['user_modified'] = $this->Authake->getUserId();

			if ($this->Coeficiente->save($this->request->data)) {
				$this->Session->setFlash(__('El coeficiente fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El coeficiente no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Coeficiente.' . $this->Coeficiente->primaryKey => $id));
			$this->request->data = $this->Coeficiente->find('first', $options);
		}
		$ambitos = $this->Coeficiente->Ambito->find('list');
		$estados = $this->Coeficiente->Estado->find('list');
		$this->set(compact('ambitos', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Coeficiente->id = $id;
		if (!$this->Coeficiente->exists()) {
			throw new NotFoundException(__('No existe coeficiente asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Coeficiente->delete()) {
			$this->Session->setFlash(__('El coeficiente fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El coeficiente no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Coeficiente->id = $id;
		if (!$this->Coeficiente->exists()) {
			throw new NotFoundException(__('No existe coeficiente asociado.'));
		}

		$this->request->data['Coeficiente']['estado_id'] = '2';
		$this->request->data['Coeficiente']['user_modified'] = $this->Authake->getUserId();

		if ($this->Coeficiente->save($this->request->data)) {
			$this->Session->setFlash(__('El coeficiente fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El coeficiente no se pudo eliminar.'));
		}
	}
}
