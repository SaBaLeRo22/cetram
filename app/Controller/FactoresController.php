<?php
App::uses('AppController', 'Controller');
/**
 * Factores Controller
 *
 * @property Factore $Factore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FactoresController extends AppController {

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
		$this->Factore->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Factore.nombre' => 'asc'
			)
		);
		$this->set('factores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Factore->exists($id)) {
			throw new NotFoundException(__('No existe factor asociado.'));
		}
		$options = array('conditions' => array('Factore.' . $this->Factore->primaryKey => $id));
//		$this->set('factore', $this->Factore->find('first', $options));
		$factore = $this->Factore->find('first', $options);

		$this->loadModel('Parametro');
		$this->Parametro->recursive = -1;
		$parametro = $this->Parametro->find('first', array(
			'conditions' => array('Parametro.id' => '5', 'Parametro.estado_id <>' => '2'),
			'recursive' => -1
		));

		$tablas = null;
		for( $i = 0 ; $i <= $factore['Factore']['antiguedad_maxima'] ; $i++ ){
			if($i == $factore['Factore']['antiguedad_maxima']){
				$tablas[$i]['fase'] = " > " . $i;
				$tablas[$i]['depreciacion'] = (1 - $factore['Factore']['valor_residual']/100) * ((1)/($factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1) / 2));
				$tablas[$i]['deducir'] = (1 - (1 - $factore['Factore']['valor_residual']/100)) * ( $factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1) / 2) / ($factore['Factore']['antiguedad_maxima']* ($factore['Factore']['antiguedad_maxima'] + 1) / 2);
				$tablas[$i]['remuneracion'] = $tablas[$i]['deducir'] * $parametro['Parametro']['valor'] / 100;

			}
			else{
				$tablas[$i]['fase'] = $i . ' a ' . ($i + 1);
				$tablas[$i]['depreciacion'] = (1 - $factore['Factore']['valor_residual']/100) * (($factore['Factore']['antiguedad_maxima'] - $i)/($factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1) / 2));
				$tablas[$i]['deducir'] = (1 - (1 - $factore['Factore']['valor_residual']/100)) * ($factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1)/2 - ($factore['Factore']['antiguedad_maxima'] - $i) * (($factore['Factore']['antiguedad_maxima'] - $i) + 1 ) / 2  ) / ($factore['Factore']['antiguedad_maxima']* ($factore['Factore']['antiguedad_maxima'] + 1) / 2);
				$tablas[$i]['remuneracion'] = $tablas[$i]['deducir'] * $parametro['Parametro']['valor'] / 100;
			}
			$tablas[$i]['antiguedad'] = $i;
		}
		$this->set(compact('factore','tablas'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Factore->create();

			$this->request->data['Factore']['estado_id'] = '1';
			$this->request->data['Factore']['user_created'] = $this->Authake->getUserId();
			$this->request->data['Factore']['user_modified'] = $this->Authake->getUserId();

			if ($this->Factore->save($this->request->data)) {
				$this->Session->setFlash(__('El factor fue registrado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El factor no se pudo registrar.'));
			}
		}
		$estados = $this->Factore->Estado->find('list');
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
		if (!$this->Factore->exists($id)) {
			throw new NotFoundException(__('No existe factor asociado.'));
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['Factore']['user_modified'] = $this->Authake->getUserId();

			if ($this->Factore->save($this->request->data)) {
				$this->Session->setFlash(__('El factor fue editado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El factor no se pudo editar.'));
			}
		} else {
			$options = array('conditions' => array('Factore.' . $this->Factore->primaryKey => $id));
			$this->request->data = $this->Factore->find('first', $options);
		}
		$estados = $this->Factore->Estado->find('list');
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
		$this->Factore->id = $id;
		if (!$this->Factore->exists()) {
			throw new NotFoundException(__('No existe factor asociado.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Factore->delete()) {
			$this->Session->setFlash(__('El factor fue eliminado.'));
		} else {
			$this->Session->setFlash(__('El factor no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function eliminar($id = null) {
		$this->Factore->id = $id;
		if (!$this->Factore->exists()) {
			throw new NotFoundException(__('No existe factor asociado.'));
		}

		$this->request->data['Factore']['estado_id'] = '2';
		$this->request->data['Factore']['user_modified'] = $this->Authake->getUserId();

		if ($this->Factore->save($this->request->data)) {
			$this->Session->setFlash(__('El factor fue eliminado.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('El factor no se pudo eliminar.'));
		}
	}
}
