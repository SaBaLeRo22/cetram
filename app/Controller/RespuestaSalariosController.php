<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaSalarios Controller
 *
 * @property RespuestaSalario $RespuestaSalario
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaSalariosController extends AppController {

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
		$this->RespuestaSalario->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Consulta.id' => 'asc', 'RespuestaSalario.id' => 'asc'
			)
		);
		$this->set('respuestaSalarios', $this->Paginator->paginate());
	}

	public function csv()
	{
		$this->RespuestaSalario->recursive = 0;
		$data = $this->RespuestaSalario->find('all', array(
			'Consulta.id' => 'asc', 'RespuestaSalario.id' => 'asc'
		));

		foreach ($data as $key => $rp) {
			if(!empty($rp['RespuestaSalario']['salario'])){$data[$key]['RespuestaSalario']['salario'] = number_format ( $rp['RespuestaSalario']['salario'], '2', ',', '.');}
			if(!empty($rp['RespuestaSalario']['cantidad'])){$data[$key]['RespuestaSalario']['cantidad'] = number_format ( $rp['RespuestaSalario']['cantidad'], '2', ',', '.');}
			if(!empty($rp['RespuestaSalario']['antiguedad'])){$data[$key]['RespuestaSalario']['antiguedad'] = number_format ( $rp['RespuestaSalario']['antiguedad'], '2', ',', '.');}
			$data[$key]['RespuestaSalario']['estado'] = $rp['Estado']['nombre'];
			$data[$key]['RespuestaSalario']['user_created'] = $this->Authake->getUsuario($rp['RespuestaSalario']['user_created']);
			$data[$key]['RespuestaSalario']['user_modified'] = $this->Authake->getUsuario($rp['RespuestaSalario']['user_modified']);
		}

		$_delimiter = ';';
		$_bom = true;
		$_null = '';
		$_serialize = 'data';

		$_extract = array(
			'RespuestaSalario.id',
			'RespuestaSalario.consulta_id',
			'RespuestaSalario.categoria',
			'RespuestaSalario.salario',
			'RespuestaSalario.cantidad',
			'RespuestaSalario.antiguedad',
			'RespuestaSalario.estado',
			'RespuestaSalario.created',
			'RespuestaSalario.modified',
			'RespuestaSalario.user_created',
			'RespuestaSalario.user_modified'
		);

		$excludePaths = array(); // Exclude all id fields
		//$_extract = $this->CsvView->prepareExtractFromFindResults($data, $excludePaths);

		$customHeaders = array();
		$options = array('includeClassname' => false, 'humanReadable' => true);
		$_header = $this->CsvView->prepareHeaderFromExtract($_extract, $customHeaders, $options);

		$this->response->download('RespuestaSalarios_'.date("Ymd").'-'.date("His").'.csv'); // <= setting the file name

		$this->viewClass = 'CsvView.Csv';
		$this->set(compact(
			'data',
			'_serialize',
			'_header',
			'_extract',
			'_delimiter',
			'_bom',
			'_null'
		));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaSalario->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta salario'));
		}
		$options = array('conditions' => array('RespuestaSalario.' . $this->RespuestaSalario->primaryKey => $id));
		$this->set('respuestaSalario', $this->RespuestaSalario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaSalario->create();
			if ($this->RespuestaSalario->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta salario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta salario could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaSalario->Consultum->find('list');
		$convenios = $this->RespuestaSalario->Convenio->find('list');
		$categorias = $this->RespuestaSalario->Categorium->find('list');
		$estados = $this->RespuestaSalario->Estado->find('list');
		$this->set(compact('consultas', 'convenios', 'categorias', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaSalario->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta salario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaSalario->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta salario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta salario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaSalario.' . $this->RespuestaSalario->primaryKey => $id));
			$this->request->data = $this->RespuestaSalario->find('first', $options);
		}
		$consultas = $this->RespuestaSalario->Consultum->find('list');
		$convenios = $this->RespuestaSalario->Convenio->find('list');
		$categorias = $this->RespuestaSalario->Categorium->find('list');
		$estados = $this->RespuestaSalario->Estado->find('list');
		$this->set(compact('consultas', 'convenios', 'categorias', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaSalario->id = $id;
		if (!$this->RespuestaSalario->exists()) {
			throw new NotFoundException(__('Invalid respuesta salario'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaSalario->delete()) {
			$this->Session->setFlash(__('The respuesta salario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta salario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
