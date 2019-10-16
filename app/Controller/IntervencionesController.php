<?php
App::uses('AppController', 'Controller');
/**
 * Intervenciones Controller
 *
 * @property Intervencione $Intervencione
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class IntervencionesController extends AppController {

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
		$this->Intervencione->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Intervencione.id' => 'asc'
			)
		);
		$this->set('intervenciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Intervencione->exists($id)) {
			throw new NotFoundException(__('No existe intervencion asociada.'));
		}
		$this->Intervencione->recursive = 2;
		$options = array('conditions' => array('Intervencione.' . $this->Intervencione->primaryKey => $id));
		$this->set('intervencione', $this->Intervencione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Intervencione->create();

			$this->request->data['Intervencione']['estado_id'] = '1';
			$this->request->data['Intervencione']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Intervencione']['user_modified'] = $this->Authake->getUserId();

			if ($this->Intervencione->save($this->request->data)) {
				$this->Session->setFlash(__('La intervencion fue registrada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La intervencion no se pudo registrar.'));
			}
		}
		$coeficientes = $this->Intervencione->Coeficiente->find('list');
		$items = $this->Intervencione->Item->find('list');
		$estados = $this->Intervencione->Estado->find('list');
		$this->set(compact('coeficientes', 'items', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Intervencione->exists($id)) {
			throw new NotFoundException(__('No existe intervencion asociada.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Intervencione']['user_modified'] = $this->Authake->getUserId();

			if ($this->Intervencione->save($this->request->data)) {
				$this->Session->setFlash(__('La intervencion fue editada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La intervencion no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Intervencione.' . $this->Intervencione->primaryKey => $id));
			$this->request->data = $this->Intervencione->find('first', $options);
		}
		$coeficientes = $this->Intervencione->Coeficiente->find('list');
		$items = $this->Intervencione->Item->find('list');
		$estados = $this->Intervencione->Estado->find('list');
		$this->set(compact('coeficientes', 'items', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Intervencione->id = $id;
		if (!$this->Intervencione->exists()) {
			throw new NotFoundException(__('No existe intervencion asociada.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Intervencione->delete()) {
			$this->Session->setFlash(__('La intervencion fue eliminada.'));
		} else {
			$this->Session->setFlash(__('La intervencion no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Intervencione->id = $id;
		if (!$this->Intervencione->exists()) {
			throw new NotFoundException(__('No existe intervencion asociada.'));
		}

		$this->request->data['Intervencione']['estado_id'] = '2';
		$this->request->data['Intervencione']['user_modified'] = $this->Authake->getUserId();

		if ($this->Intervencione->save($this->request->data)) {
			$this->Session->setFlash(__('La intervencion fue eliminada.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('La intervencion no se pudo eliminar.'));
		}
	}
}
