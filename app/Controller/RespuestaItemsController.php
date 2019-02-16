<?php
App::uses('AppController', 'Controller');
/**
 * RespuestaItems Controller
 *
 * @property RespuestaItem $RespuestaItem
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaItemsController extends AppController {

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
		$this->RespuestaItem->recursive = 0;
		$this->paginate = array(
			'limit' => '5',
			'order' => array(
				'RespuestaItem.id' => 'asc', 'RespuestaItem.id' => 'asc'
			)
		);
		$this->set('respuestaItems', $this->Paginator->paginate());
	}

	public function csv()
	{
		$this->RespuestaItem->recursive = 0;
		$data = $this->RespuestaItem->find('all', array(
			'Consulta.id' => 'asc', 'RespuestaItem.id' => 'asc'
		));

		foreach ($data as $key => $rp) {
			if(!empty($rp['RespuestaItem']['valor'])){$data[$key]['RespuestaItem']['valor'] = number_format ( $rp['RespuestaItem']['valor'], '2', ',', '.');}
			if(!empty($rp['RespuestaItem']['incidencia_valor'])){$data[$key]['RespuestaItem']['incidencia_valor'] = number_format ( $rp['RespuestaItem']['incidencia_valor'], '2', ',', '.');}
			if(!empty($rp['RespuestaItem']['minimo'])){$data[$key]['RespuestaItem']['minimo'] = number_format ( $rp['RespuestaItem']['minimo'], '2', ',', '.');}
			if(!empty($rp['RespuestaItem']['incidencia_minimo'])){$data[$key]['RespuestaItem']['incidencia_minimo'] = number_format ( $rp['RespuestaItem']['incidencia_minimo'], '2', ',', '.');}
			if(!empty($rp['RespuestaItem']['maximo'])){$data[$key]['RespuestaItem']['maximo'] = number_format ( $rp['RespuestaItem']['maximo'], '2', ',', '.');}
			if(!empty($rp['RespuestaItem']['incidencia_maximo'])){$data[$key]['RespuestaItem']['incidencia_maximo'] = number_format ( $rp['RespuestaItem']['incidencia_maximo'], '2', ',', '.');}
			$data[$key]['RespuestaItem']['estado'] = $rp['Estado']['nombre'];
			$data[$key]['RespuestaItem']['user_created'] = $this->Authake->getUsuario($rp['RespuestaItem']['user_created']);
			$data[$key]['RespuestaItem']['user_modified'] = $this->Authake->getUsuario($rp['RespuestaItem']['user_modified']);
			if(!empty($rp['RespuestaItem']['superior'])){$data[$key]['RespuestaItem']['superior'] = number_format ( $rp['RespuestaItem']['superior'], '2', ',', '.');}
			if(!empty($rp['RespuestaItem']['incidencia_superior'])){$data[$key]['RespuestaItem']['incidencia_superior'] = number_format ( $rp['RespuestaItem']['incidencia_superior'], '2', ',', '.');}
			if(!empty($rp['RespuestaItem']['inferior'])){$data[$key]['RespuestaItem']['inferior'] = number_format ( $rp['RespuestaItem']['inferior'], '2', ',', '.');}
			if(!empty($rp['RespuestaItem']['incidencia_inferior'])){$data[$key]['incidencia_inferior']['incidencia_superior'] = number_format ( $rp['RespuestaItem']['incidencia_inferior'], '2', ',', '.');}
		}

		$_delimiter = ';';
		$_bom = true;
		$_null = '';
		$_serialize = 'data';

		$_extract = array(
			'RespuestaItem.id',
			'RespuestaItem.consulta_id',
			'RespuestaItem.item',
			'RespuestaItem.unidad',
			'RespuestaItem.minimo',
			'RespuestaItem.incidencia_minimo',
			'RespuestaItem.inferior',
			'RespuestaItem.incidencia_inferior',
			'RespuestaItem.valor',
			'RespuestaItem.incidencia_valor',
			'RespuestaItem.superior',
			'RespuestaItem.incidencia_superior',
			'RespuestaItem.maximo',
			'RespuestaItem.incidencia_maximo',
			'RespuestaItem.estado',
			'RespuestaItem.created',
			'RespuestaItem.modified',
			'RespuestaItem.user_created',
			'RespuestaItem.user_modified'
		);

		$excludePaths = array(); // Exclude all id fields
		//$_extract = $this->CsvView->prepareExtractFromFindResults($data, $excludePaths);

		$customHeaders = array();
		$options = array('includeClassname' => false, 'humanReadable' => true);
		$_header = $this->CsvView->prepareHeaderFromExtract($_extract, $customHeaders, $options);

		$this->response->download('RespuestaItems_'.date("Ymd").'-'.date("His").'.csv'); // <= setting the file name

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
		if (!$this->RespuestaItem->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta item'));
		}
		$options = array('conditions' => array('RespuestaItem.' . $this->RespuestaItem->primaryKey => $id));
		$this->set('respuestaItem', $this->RespuestaItem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RespuestaItem->create();
			if ($this->RespuestaItem->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta item could not be saved. Please, try again.'));
			}
		}
		$consultas = $this->RespuestaItem->Consultum->find('list');
		$items = $this->RespuestaItem->Item->find('list');
		$unidades = $this->RespuestaItem->Unidade->find('list');
		$estados = $this->RespuestaItem->Estado->find('list');
		$this->set(compact('consultas', 'items', 'unidades', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RespuestaItem->exists($id)) {
			throw new NotFoundException(__('Invalid respuesta item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RespuestaItem->save($this->request->data)) {
				$this->Session->setFlash(__('The respuesta item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The respuesta item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RespuestaItem.' . $this->RespuestaItem->primaryKey => $id));
			$this->request->data = $this->RespuestaItem->find('first', $options);
		}
		$consultas = $this->RespuestaItem->Consultum->find('list');
		$items = $this->RespuestaItem->Item->find('list');
		$unidades = $this->RespuestaItem->Unidade->find('list');
		$estados = $this->RespuestaItem->Estado->find('list');
		$this->set(compact('consultas', 'items', 'unidades', 'estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RespuestaItem->id = $id;
		if (!$this->RespuestaItem->exists()) {
			throw new NotFoundException(__('Invalid respuesta item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RespuestaItem->delete()) {
			$this->Session->setFlash(__('The respuesta item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The respuesta item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
