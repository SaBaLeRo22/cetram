<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaPreguntas Controller
 *
 * @property RespuestaPregunta $RespuestaPregunta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaPreguntasController extends AppController {

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
		$this->RespuestaPregunta->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Consulta.id' => 'asc', 'RespuestaPregunta.id' => 'asc'
			)
		);
		$this->set('respuestaPreguntas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaPregunta->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta pregunta'));
		}
		$options = array('conditions' => array('RespuestaPregunta.' . $this->RespuestaPregunta->primaryKey => $id));
		$this->set('respuestaPregunta', $this->RespuestaPregunta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaPregunta->create();
			if ($this->RespuestaPregunta->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta pregunta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta pregunta could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaPregunta->Consultum->find('list');
		$preguntas = $this->RespuestaPregunta->Preguntum->find('list');
		$unidades = $this->RespuestaPregunta->Unidade->find('list');
		$estados = $this->RespuestaPregunta->Estado->find('list');
		$this->set(compact('consultas', 'preguntas', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaPregunta->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta pregunta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaPregunta->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta pregunta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta pregunta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaPregunta.' . $this->RespuestaPregunta->primaryKey => $id));
			$this->request->data = $this->RespuestaPregunta->find('first', $options);
		}
		$consultas = $this->RespuestaPregunta->Consultum->find('list');
		$preguntas = $this->RespuestaPregunta->Preguntum->find('list');
		$unidades = $this->RespuestaPregunta->Unidade->find('list');
		$estados = $this->RespuestaPregunta->Estado->find('list');
		$this->set(compact('consultas', 'preguntas', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaPregunta->id = $id;
		if (!$this->RespuestaPregunta->exists()) {
			throw new NotFoundException(__('Invalid respuesta pregunta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaPregunta->delete()) {
			$this->Session->setFlash(__('The respuesta pregunta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta pregunta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
