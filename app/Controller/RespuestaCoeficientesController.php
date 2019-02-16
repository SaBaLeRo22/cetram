<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaCoeficientes Controller
 *
 * @property RespuestaCoeficiente $RespuestaCoeficiente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaCoeficientesController extends AppController {

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
		$this->RespuestaCoeficiente->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Consulta.id' => 'asc', 'RespuestaCoeficiente.id' => 'asc'
			)
		);
		$this->set('respuestaCoeficientes', $this->Paginator->paginate());
	}

	public function csv()
	{
		$this->RespuestaCoeficiente->recursive = 0;
		$data = $this->RespuestaCoeficiente->find('all', array(
			'Consulta.id' => 'asc', 'RespuestaCoeficiente.id' => 'asc'
		));

		foreach ($data as $key => $rp) {
			if(!empty($rp['RespuestaCoeficiente']['valor'])){$data[$key]['RespuestaCoeficiente']['valor'] = number_format ( $rp['RespuestaCoeficiente']['valor'], '2', ',', '.');}
			if(!empty($rp['RespuestaCoeficiente']['minimo'])){$data[$key]['RespuestaCoeficiente']['minimo'] = number_format ( $rp['RespuestaCoeficiente']['minimo'], '2', ',', '.');}
			if(!empty($rp['RespuestaCoeficiente']['maximo'])){$data[$key]['RespuestaCoeficiente']['maximo'] = number_format ( $rp['RespuestaCoeficiente']['maximo'], '2', ',', '.');}
			$data[$key]['RespuestaCoeficiente']['estado'] = $rp['Estado']['nombre'];
			$data[$key]['RespuestaCoeficiente']['user_created'] = $this->Authake->getUsuario($rp['RespuestaCoeficiente']['user_created']);
			$data[$key]['RespuestaCoeficiente']['user_modified'] = $this->Authake->getUsuario($rp['RespuestaCoeficiente']['user_modified']);
		}

		$_delimiter = ';';
		$_bom = true;
		$_null = '';
		$_serialize = 'data';

		$_extract = array(
			'RespuestaCoeficiente.id',
			'RespuestaCoeficiente.consulta_id',
			'RespuestaCoeficiente.coeficiente',
			'RespuestaCoeficiente.minimo',
			'RespuestaCoeficiente.valor',
			'RespuestaCoeficiente.maximo',
			'RespuestaCoeficiente.unidad',
			'RespuestaCoeficiente.estado',
			'RespuestaCoeficiente.created',
			'RespuestaCoeficiente.modified',
			'RespuestaCoeficiente.user_created',
			'RespuestaCoeficiente.user_modified'
		);

		$excludePaths = array(); // Exclude all id fields
		//$_extract = $this->CsvView->prepareExtractFromFindResults($data, $excludePaths);

		$customHeaders = array();
		$options = array('includeClassname' => false, 'humanReadable' => true);
		$_header = $this->CsvView->prepareHeaderFromExtract($_extract, $customHeaders, $options);

		$this->response->download('RespuestaCoeficientes_'.date("Ymd").'-'.date("His").'.csv'); // <= setting the file name

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
		if (!$this->RespuestaCoeficiente->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta coeficiente'));
		}
		$options = array('conditions' => array('RespuestaCoeficiente.' . $this->RespuestaCoeficiente->primaryKey => $id));
		$this->set('respuestaCoeficiente', $this->RespuestaCoeficiente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaCoeficiente->create();
			if ($this->RespuestaCoeficiente->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta coeficiente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta coeficiente could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaCoeficiente->Consulta->find('list');
		$coeficientes = $this->RespuestaCoeficiente->Coeficiente->find('list');
		$unidades = $this->RespuestaCoeficiente->Unidade->find('list');
		$estados = $this->RespuestaCoeficiente->Estado->find('list');
		$this->set(compact('consultas', 'coeficientes', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaCoeficiente->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta coeficiente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaCoeficiente->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta coeficiente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta coeficiente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaCoeficiente.' . $this->RespuestaCoeficiente->primaryKey => $id));
			$this->request->data = $this->RespuestaCoeficiente->find('first', $options);
		}
		$consultas = $this->RespuestaCoeficiente->Consultum->find('list');
		$coeficientes = $this->RespuestaCoeficiente->Coeficiente->find('list');
		$unidades = $this->RespuestaCoeficiente->Unidade->find('list');
		$estados = $this->RespuestaCoeficiente->Estado->find('list');
		$this->set(compact('consultas', 'coeficientes', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaCoeficiente->id = $id;
		if (!$this->RespuestaCoeficiente->exists()) {
			throw new NotFoundException(__('Invalid respuesta coeficiente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaCoeficiente->delete()) {
			$this->Session->setFlash(__('The respuesta coeficiente has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta coeficiente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
