<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaParametros Controller
 *
 * @property RespuestaParametro $RespuestaParametro
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaParametrosController extends AppController {

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
		$this->RespuestaParametro->recursive = 0;

		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Consulta.id' => 'asc', 'RespuestaParametro.id' => 'asc'
			)
		);

		$this->set('respuestaParametros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RespuestaParametro->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta parametro'));
		}
		$options = array('conditions' => array('RespuestaParametro.' . $this->RespuestaParametro->primaryKey => $id));
		$this->set('respuestaParametro', $this->RespuestaParametro->find('first', $options));
	}

	public function csv()
	{
		$this->RespuestaParametro->recursive = 0;
		$data = $this->RespuestaParametro->find('all', array(
			'Consulta.id' => 'asc', 'RespuestaParametro.id' => 'asc'
		));

		foreach ($data as $key => $rp) {
			if(!empty($rp['RespuestaParametro']['valor'])){$data[$key]['RespuestaParametro']['valor'] = number_format ( $rp['RespuestaParametro']['valor'], '2', ',', '.');}
			if(!empty($rp['RespuestaParametro']['minimo'])){$data[$key]['RespuestaParametro']['minimo'] = number_format ( $rp['RespuestaParametro']['minimo'], '2', ',', '.');}
			if(!empty($rp['RespuestaParametro']['maximo'])){$data[$key]['RespuestaParametro']['maximo'] = number_format ( $rp['RespuestaParametro']['maximo'], '2', ',', '.');}
			if($rp['RespuestaParametro']['editado']=='1'){$data[$key]['RespuestaParametro']['editado']='SI';} else{$data[$key]['RespuestaParametro']['editado']='NO';}
			$data[$key]['RespuestaParametro']['estado'] = $rp['Estado']['nombre'];
			$data[$key]['RespuestaParametro']['user_created'] = $this->Authake->getUsuario($rp['RespuestaParametro']['user_created']);
			$data[$key]['RespuestaParametro']['user_modified'] = $this->Authake->getUsuario($rp['RespuestaParametro']['user_modified']);
		}

		$_delimiter = ';';
		$_bom = true;
		$_null = '';
		$_serialize = 'data';

		$_extract = array(
			'RespuestaParametro.id',
			'RespuestaParametro.consulta_id',
			'RespuestaParametro.parametro',
			'RespuestaParametro.valor',
			'RespuestaParametro.unidad',
			'RespuestaParametro.editado',
			'RespuestaParametro.minimo',
			'RespuestaParametro.maximo',
			'RespuestaParametro.estado',
			'RespuestaParametro.created',
			'RespuestaParametro.modified',
			'RespuestaParametro.user_created',
			'RespuestaParametro.user_modified'
		);

		$excludePaths = array(); // Exclude all id fields
		//$_extract = $this->CsvView->prepareExtractFromFindResults($data, $excludePaths);

		$customHeaders = array();
		$options = array('includeClassname' => false, 'humanReadable' => true);
		$_header = $this->CsvView->prepareHeaderFromExtract($_extract, $customHeaders, $options);

		$this->response->download('RespuestaParametros_'.date("Ymd").'-'.date("His").'.csv'); // <= setting the file name

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
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaParametro->create();
			if ($this->RespuestaParametro->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta parametro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta parametro could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaParametro->Consultum->find('list');
		$parametros = $this->RespuestaParametro->Parametro->find('list');
		$unidades = $this->RespuestaParametro->Unidade->find('list');
		$estados = $this->RespuestaParametro->Estado->find('list');
		$this->set(compact('consultas', 'parametros', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaParametro->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta parametro'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaParametro->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta parametro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta parametro could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaParametro.' . $this->RespuestaParametro->primaryKey => $id));
			$this->request->data = $this->RespuestaParametro->find('first', $options);
		}
		$consultas = $this->RespuestaParametro->Consultum->find('list');
		$parametros = $this->RespuestaParametro->Parametro->find('list');
		$unidades = $this->RespuestaParametro->Unidade->find('list');
		$estados = $this->RespuestaParametro->Estado->find('list');
		$this->set(compact('consultas', 'parametros', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaParametro->id = $id;
		if (!$this->RespuestaParametro->exists()) {
			throw new NotFoundException(__('Invalid respuesta parametro'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaParametro->delete()) {
			$this->Session->setFlash(__('The respuesta parametro has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta parametro could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
