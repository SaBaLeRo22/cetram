<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaIndicadores Controller
 *
 * @property RespuestaIndicadore $RespuestaIndicadore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaIndicadoresController extends AppController {

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
		$this->RespuestaIndicadore->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'Consulta.id' => 'asc', 'RespuestaIndicadore.id' => 'asc'
			)
		);
		$this->set('respuestaIndicadores', $this->Paginator->paginate());
	}

	public function csv()
	{
		$this->RespuestaIndicadore->recursive = 0;
		$data = $this->RespuestaIndicadore->find('all', array(
			'Consulta.id' => 'asc', 'RespuestaIndicadore.id' => 'asc'
		));

		foreach ($data as $key => $rp) {
			if(!empty($rp['RespuestaIndicadore']['valor'])){$data[$key]['RespuestaIndicadore']['valor'] = number_format ( $rp['RespuestaIndicadore']['valor'], '2', ',', '.');}
			if(!empty($rp['RespuestaIndicadore']['minimo'])){$data[$key]['RespuestaIndicadore']['minimo'] = number_format ( $rp['RespuestaIndicadore']['minimo'], '2', ',', '.');}
			if(!empty($rp['RespuestaIndicadore']['maximo'])){$data[$key]['RespuestaIndicadore']['maximo'] = number_format ( $rp['RespuestaIndicadore']['maximo'], '2', ',', '.');}
			if(!empty($rp['RespuestaIndicadore']['menor'])){$data[$key]['RespuestaIndicadore']['menor'] = number_format ( $rp['RespuestaIndicadore']['menor'], '2', ',', '.');}
			if(!empty($rp['RespuestaIndicadore']['mayor'])){$data[$key]['RespuestaIndicadore']['mayor'] = number_format ( $rp['RespuestaIndicadore']['mayor'], '2', ',', '.');}
			if($rp['RespuestaIndicadore']['notificar']=='1'){$data[$key]['RespuestaIndicadore']['notificar']='SI';} else{$data[$key]['RespuestaIndicadore']['notificar']='NO';}
			$data[$key]['RespuestaIndicadore']['estado'] = $rp['Estado']['nombre'];
			$data[$key]['RespuestaIndicadore']['user_created'] = $this->Authake->getUsuario($rp['RespuestaIndicadore']['user_created']);
			$data[$key]['RespuestaIndicadore']['user_modified'] = $this->Authake->getUsuario($rp['RespuestaIndicadore']['user_modified']);
		}

		$_delimiter = ';';
		$_bom = true;
		$_null = '';
		$_serialize = 'data';

		$_extract = array(
			'RespuestaIndicadore.id',
			'RespuestaIndicadore.consulta_id',
			'RespuestaIndicadore.indicador',
			'RespuestaIndicadore.valor',
			'RespuestaIndicadore.alerta',
			'RespuestaIndicadore.mensaje',
			'RespuestaIndicadore.evento',
			'RespuestaIndicadore.color',
			'RespuestaIndicadore.menor',
			'RespuestaIndicadore.minimo',
			'RespuestaIndicadore.maximo',
			'RespuestaIndicadore.mayor',
			'RespuestaIndicadore.unidad',
			'RespuestaIndicadore.notificar',
			'RespuestaIndicadore.estado',
			'RespuestaIndicadore.created',
			'RespuestaIndicadore.modified',
			'RespuestaIndicadore.user_created',
			'RespuestaIndicadore.user_modified'
		);

		$excludePaths = array(); // Exclude all id fields
		//$_extract = $this->CsvView->prepareExtractFromFindResults($data, $excludePaths);

		$customHeaders = array();
		$options = array('includeClassname' => false, 'humanReadable' => true);
		$_header = $this->CsvView->prepareHeaderFromExtract($_extract, $customHeaders, $options);

		$this->response->download('RespuestaIndicadores_'.date("Ymd").'-'.date("His").'.csv'); // <= setting the file name

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
		if (!$this->RespuestaIndicadore->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta indicadore'));
		}
		$options = array('conditions' => array('RespuestaIndicadore.' . $this->RespuestaIndicadore->primaryKey => $id));
		$this->set('respuestaIndicadore', $this->RespuestaIndicadore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaIndicadore->create();
			if ($this->RespuestaIndicadore->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta indicadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta indicadore could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaIndicadore->Consultum->find('list');
		$indicadores = $this->RespuestaIndicadore->Indicadore->find('list');
		$unidades = $this->RespuestaIndicadore->Unidade->find('list');
		$estados = $this->RespuestaIndicadore->Estado->find('list');
		$this->set(compact('consultas', 'indicadores', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaIndicadore->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta indicadore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaIndicadore->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta indicadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta indicadore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaIndicadore.' . $this->RespuestaIndicadore->primaryKey => $id));
			$this->request->data = $this->RespuestaIndicadore->find('first', $options);
		}
		$consultas = $this->RespuestaIndicadore->Consultum->find('list');
		$indicadores = $this->RespuestaIndicadore->Indicadore->find('list');
		$unidades = $this->RespuestaIndicadore->Unidade->find('list');
		$estados = $this->RespuestaIndicadore->Estado->find('list');
		$this->set(compact('consultas', 'indicadores', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaIndicadore->id = $id;
		if (!$this->RespuestaIndicadore->exists()) {
			throw new NotFoundException(__('Invalid respuesta indicadore'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaIndicadore->delete()) {
			$this->Session->setFlash(__('The respuesta indicadore has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta indicadore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
