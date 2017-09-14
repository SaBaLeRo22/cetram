<?php
App::uses('AppController', 'Controller');
/**
 * Preguntas Controller
 *
 * @property Pregunta $Pregunta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PreguntasController extends AppController {

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
		$this->Pregunta->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Pregunta.agrupamiento_id' => 'asc',
				'Pregunta.orden' => 'asc'
			)
		);
		$this->set('preguntas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pregunta->exists($id)) {
			throw new NotFoundException(__('Invalid pregunta'));
		}
		$this->Pregunta->recursive = 2;
		$options = array('conditions' => array('Pregunta.' . $this->Pregunta->primaryKey => $id));
		$pregunta = $this->Pregunta->find('first', $options);
		$this->set('pregunta', $pregunta);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pregunta->create();

			$this->request->data['Pregunta']['estado_id'] = '1';
			$this->request->data['Pregunta']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Pregunta']['user_modified'] = $this->Authake->getUserId();

			if ($this->Pregunta->save($this->request->data)) {
				$this->Session->setFlash(__('The pregunta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pregunta could not be saved. Please, try again.'));
			}
		}
		$multiplicadores = $this->Pregunta->Multiplicadore->find('list');
		$agrupamientos = $this->Pregunta->Agrupamiento->find('list');
		$unidades = $this->Pregunta->Unidade->find('list');
		$ambitos = $this->Pregunta->Ambito->find('list');
		$estados = $this->Pregunta->Estado->find('list');
		$this->set(compact('multiplicadores', 'agrupamientos', 'unidades', 'ambitos', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pregunta->exists($id)) {
			throw new NotFoundException(__('Invalid pregunta'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Pregunta']['user_modified'] = $this->Authake->getUserId();

			if ($this->Pregunta->save($this->request->data)) {
				$this->Session->setFlash(__('The pregunta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pregunta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pregunta.' . $this->Pregunta->primaryKey => $id));
			$this->request->data = $this->Pregunta->find('first', $options);
		}
		$multiplicadores = $this->Pregunta->Multiplicadore->find('list');
		$agrupamientos = $this->Pregunta->Agrupamiento->find('list');
		$unidades = $this->Pregunta->Unidade->find('list');
		$ambitos = $this->Pregunta->Ambito->find('list');
		$estados = $this->Pregunta->Estado->find('list');
		$this->set(compact('multiplicadores', 'agrupamientos', 'unidades', 'ambitos', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pregunta->id = $id;
		if (!$this->Pregunta->exists()) {
			throw new NotFoundException(__('Invalid pregunta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pregunta->delete()) {
			$this->Session->setFlash(__('The pregunta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pregunta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Pregunta->id = $id;
		if (!$this->Pregunta->exists()) {
			throw new NotFoundException(__('Invalid pregunta'));
		}

		$this->request->data['Pregunta']['estado_id'] = '2';
		$this->request->data['Pregunta']['user_modified'] = $this->Authake->getUserId();

		if ($this->Pregunta->save($this->request->data)) {
			$this->Session->setFlash(__('The pregunta has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The pregunta could not be saved. Please, try again.'));
		}
	}
}
