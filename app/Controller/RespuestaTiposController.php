<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaTipos Controller
 *
 * @property RespuestaTipo $RespuestaTipo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaTiposController extends AppController {

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
		$this->RespuestaTipo->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Consulta.id' => 'asc', 'RespuestaTipo.id' => 'asc'
			)
		);
		$this->set('respuestaTipos', $this->Paginator->paginate());
	}

	public function csv()
	{
		$this->RespuestaTipo->recursive = 0;
		$data = $this->RespuestaTipo->find('all', array(
			'Consulta.id' => 'asc', 'RespuestaTipo.id' => 'asc'
		));

		foreach ($data as $key => $rp) {
			if(!empty($rp['RespuestaTipo']['valor'])){$data[$key]['RespuestaTipo']['valor'] = number_format ( $rp['RespuestaTipo']['valor'], '2', ',', '.');}
			if(!empty($rp['RespuestaTipo']['incidencia_valor'])){$data[$key]['RespuestaTipo']['incidencia_valor'] = number_format ( $rp['RespuestaTipo']['incidencia_valor'], '2', ',', '.');}
			if(!empty($rp['RespuestaTipo']['minimo'])){$data[$key]['RespuestaTipo']['minimo'] = number_format ( $rp['RespuestaTipo']['minimo'], '2', ',', '.');}
			if(!empty($rp['RespuestaTipo']['incidencia_minimo'])){$data[$key]['RespuestaTipo']['incidencia_minimo'] = number_format ( $rp['RespuestaTipo']['incidencia_minimo'], '2', ',', '.');}
			if(!empty($rp['RespuestaTipo']['maximo'])){$data[$key]['RespuestaTipo']['maximo'] = number_format ( $rp['RespuestaTipo']['maximo'], '2', ',', '.');}
			if(!empty($rp['RespuestaTipo']['incidencia_maximo'])){$data[$key]['RespuestaTipo']['incidencia_maximo'] = number_format ( $rp['RespuestaTipo']['incidencia_maximo'], '2', ',', '.');}
			$data[$key]['RespuestaTipo']['estado'] = $rp['Estado']['nombre'];
			$data[$key]['RespuestaTipo']['user_created'] = $this->Authake->getUsuario($rp['RespuestaTipo']['user_created']);
			$data[$key]['RespuestaTipo']['user_modified'] = $this->Authake->getUsuario($rp['RespuestaTipo']['user_modified']);
		}

		$_delimiter = ';';
		$_bom = true;
		$_null = '';
		$_serialize = 'data';

		$_extract = array(
			'RespuestaTipo.id',
			'RespuestaTipo.consulta_id',
			'RespuestaTipo.tipo',
			'RespuestaTipo.unidad',
			'RespuestaTipo.valor',
			'RespuestaTipo.incidencia_valor',
			'RespuestaTipo.minimo',
			'RespuestaTipo.incidencia_minimo',
			'RespuestaTipo.maximo',
			'RespuestaTipo.incidencia_maximo',
			'RespuestaTipo.estado',
			'RespuestaTipo.created',
			'RespuestaTipo.modified',
			'RespuestaTipo.user_created',
			'RespuestaTipo.user_modified'
		);

		$excludePaths = array(); // Exclude all id fields
		//$_extract = $this->CsvView->prepareExtractFromFindResults($data, $excludePaths);

		$customHeaders = array();
		$options = array('includeClassname' => false, 'humanReadable' => true);
		$_header = $this->CsvView->prepareHeaderFromExtract($_extract, $customHeaders, $options);

		$this->response->download('RespuestaTipos_'.date("Ymd").'-'.date("His").'.csv'); // <= setting the file name

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
		if (!$this->RespuestaTipo->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta tipo'));
		}
		$options = array('conditions' => array('RespuestaTipo.' . $this->RespuestaTipo->primaryKey => $id));
		$this->set('respuestaTipo', $this->RespuestaTipo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaTipo->create();
			if ($this->RespuestaTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta tipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta tipo could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaTipo->Consultum->find('list');
		$tipos = $this->RespuestaTipo->Tipo->find('list');
		$unidades = $this->RespuestaTipo->Unidade->find('list');
		$estados = $this->RespuestaTipo->Estado->find('list');
		$this->set(compact('consultas', 'tipos', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaTipo->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaTipo->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta tipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta tipo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaTipo.' . $this->RespuestaTipo->primaryKey => $id));
			$this->request->data = $this->RespuestaTipo->find('first', $options);
		}
		$consultas = $this->RespuestaTipo->Consultum->find('list');
		$tipos = $this->RespuestaTipo->Tipo->find('list');
		$unidades = $this->RespuestaTipo->Unidade->find('list');
		$estados = $this->RespuestaTipo->Estado->find('list');
		$this->set(compact('consultas', 'tipos', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaTipo->id = $id;
		if (!$this->RespuestaTipo->exists()) {
			throw new NotFoundException(__('Invalid respuesta tipo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaTipo->delete()) {
			$this->Session->setFlash(__('The respuesta tipo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta tipo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
