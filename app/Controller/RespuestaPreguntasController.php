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
	public $components = array('Paginator', 'Session', 'RequestHandler' => array(
		'viewClassMap' => array('csv' => 'CsvView.Csv')
	));

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

	public function csv()
	{
		$this->RespuestaPregunta->recursive = 0;
		$data = $this->RespuestaPregunta->find('all', array(
			'Consulta.id' => 'asc', 'RespuestaPregunta.id' => 'asc'
		));

		foreach ($data as $key => $rp) {
			if(!empty($rp['RespuestaPregunta']['valor'])){$data[$key]['RespuestaPregunta']['valor'] = number_format ( $rp['RespuestaPregunta']['valor'], '2', ',', '.');}
			if(!empty($rp['RespuestaPregunta']['minimo'])){$data[$key]['RespuestaPregunta']['minimo'] = number_format ( $rp['RespuestaPregunta']['minimo'], '2', ',', '.');}
			if(!empty($rp['RespuestaPregunta']['maximo'])){$data[$key]['RespuestaPregunta']['maximo'] = number_format ( $rp['RespuestaPregunta']['maximo'], '2', ',', '.');}
			if(!empty($rp['RespuestaPregunta']['funcion'])){$data[$key]['RespuestaPregunta']['funcion'] = number_format ( $rp['RespuestaPregunta']['funcion'], '2', ',', '.');}
			$data[$key]['RespuestaPregunta']['estado'] = $rp['Estado']['nombre'];
			$data[$key]['RespuestaPregunta']['user_created'] = $this->Authake->getUsuario($rp['RespuestaPregunta']['user_created']);
			$data[$key]['RespuestaPregunta']['user_modified'] = $this->Authake->getUsuario($rp['RespuestaPregunta']['user_modified']);
		}

		$_delimiter = ';';
		$_bom = true;
		$_null = '';
		$_serialize = 'data';

		$_extract = array(
			'RespuestaPregunta.id',
			'RespuestaPregunta.consulta_id',
			'RespuestaPregunta.pregunta',
			'RespuestaPregunta.respuesta',
			'RespuestaPregunta.unidad',
			'RespuestaPregunta.valor',
			'RespuestaPregunta.funcion',
			'RespuestaPregunta.minimo',
			'RespuestaPregunta.maximo',
			'RespuestaPregunta.estado',
			'RespuestaPregunta.created',
			'RespuestaPregunta.modified',
			'RespuestaPregunta.user_created',
			'RespuestaPregunta.user_modified'
		);

		$excludePaths = array(); // Exclude all id fields
		//$_extract = $this->CsvView->prepareExtractFromFindResults($data, $excludePaths);

		$customHeaders = array();
		$options = array('includeClassname' => false, 'humanReadable' => true);
		$_header = $this->CsvView->prepareHeaderFromExtract($_extract, $customHeaders, $options);

		$this->response->download('RespuestaPreguntas_'.date("Ymd").'-'.date("His").'.csv'); // <= setting the file name

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
		if (!$this->RespuestaPregunta->exists($id)) {
			throw new NotFoundException(__('No existe respuesta asociada.'));
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
				$this->Session->setFlash(__('La respuesta fue registrada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La respuesta no se pudo registrar.'));
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
			throw new NotFoundException(__('No existe respuesta asociada.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaPregunta->save($this->request->data)) {
				$this->Session->setFlash(__('La respuesta fue editada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La respuesta no se pudo editar.'));
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
			throw new NotFoundException(__('No existe respuesta asociada.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaPregunta->delete()) {
			$this->Session->setFlash(__('La respuesta fue eliminada.'));
		} else {
			$this->Session->setFlash(__('La respuesta no se pudo eliminar.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
