<?php
App::uses('AppController', 'Controller');
/**
 * Consultas Controller
 *
 * @property Consulta $Consulta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ConsultasController extends AppController {

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
		$this->Consulta->recursive = 0;
		$this->set('consultas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Consulta->exists($id)) {
			throw new NotFoundException(__('Invalid consulta'));
		}
		$options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
		$this->set('consulta', $this->Consulta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Consulta->create();
			if ($this->Consulta->save($this->request->data)) {
				$this->Session->setFlash(__('The consulta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Consulta->Estado->find('list');
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
		if (!$this->Consulta->exists($id)) {
			throw new NotFoundException(__('Invalid consulta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Consulta->save($this->request->data)) {
				$this->Session->setFlash(__('The consulta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
			$this->request->data = $this->Consulta->find('first', $options);
		}
		$estados = $this->Consulta->Estado->find('list');
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
		$this->Consulta->id = $id;
		if (!$this->Consulta->exists()) {
			throw new NotFoundException(__('Invalid consulta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Consulta->delete()) {
			$this->Session->setFlash(__('The consulta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The consulta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * realizar method
	 *
	 * @return void
	 */
	public function realizar() {

		$this->loadModel('Pregunta');
		$this->Pregunta->recursive = -1;

		$this->loadModel('Opcione');
		$this->Opcione->recursive = -1;

		$this->loadModel('RespuestaPregunta');
		$this->RespuestaPregunta->recursive = -1;


		if ($this->request->is('post')) {
			$this->Consulta->create();

			$consulta['Consulta']['costo'] = 0;
			$consulta['Consulta']['tarifa'] = 0;
			$consulta['Consulta']['subsidio'] = 0;
			$consulta['Consulta']['observaciones'] = $this->request->data['Consulta']['observaciones'];
			$consulta['Consulta']['estado_id'] = 1;
			$consulta['Consulta']['user_created'] = $this->Authake->getUserId();
			$consulta['Consulta']['user_modified'] = $this->Authake->getUserId();

			if (!$this->Consulta->save($consulta)) {
				$this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
			}

			$consulta['Consulta']['id'] = $this->Consulta->id;

//			debug($this->request->data);exit();

			foreach ($this->request->data['Consulta'] as $key => $respuesta) {
//				debug($key);
//				debug($respuesta);

				/*				$respuesta_pregunta = $this->Pregunta->find('first', array(
                                    'conditions' => array('Pregunta.id' => $key),
                                    'recursive' => -1
                                ));*/

				$respuesta_opcion = $this->Opcione->find('first', array(
					'conditions' => array('Opcione.id' => $respuesta),
					'recursive' => 0,
					'fields' => array('Pregunta.*, Opcione.*, Unidade.*')
				));

				if (!empty($respuesta_opcion)) {
					$this->RespuestaPregunta->create();

//					debug($respuesta_opcion);

					$respuestaPregunta['RespuestaPregunta']['consulta_id'] = $consulta['Consulta']['id'];
					$respuestaPregunta['RespuestaPregunta']['pregunta_id'] = $respuesta_opcion['Pregunta']['id'];
					$respuestaPregunta['RespuestaPregunta']['pregunta'] = $respuesta_opcion['Pregunta']['pregunta'];
					$respuestaPregunta['RespuestaPregunta']['valor'] = $respuesta_opcion['Opcione']['funcion'];
					$respuestaPregunta['RespuestaPregunta']['minimo'] = $respuesta_opcion['Pregunta']['minimo'];
					$respuestaPregunta['RespuestaPregunta']['maximo'] = $respuesta_opcion['Pregunta']['maximo'];
					$respuestaPregunta['RespuestaPregunta']['unidade_id'] = $respuesta_opcion['Pregunta']['unidade_id'];
					$respuestaPregunta['RespuestaPregunta']['unidad'] = $respuesta_opcion['Unidade']['nombre'];
					$respuestaPregunta['RespuestaPregunta']['respuesta'] = $respuesta_opcion['Opcione']['opcion'];
					$respuestaPregunta['RespuestaPregunta']['opcione_id'] = $respuesta_opcion['Opcione']['id'];
					$respuestaPregunta['RespuestaPregunta']['funcion'] = $respuesta_opcion['Opcione']['funcion'];
					$respuestaPregunta['RespuestaPregunta']['estado_id'] = 1;
					$respuestaPregunta['RespuestaPregunta']['user_created'] = $this->Authake->getUserId();
					$respuestaPregunta['RespuestaPregunta']['user_modified'] = $this->Authake->getUserId();

					if (!$this->RespuestaPregunta->save($respuestaPregunta)) {
						$this->Session->setFlash(__('The RespuestaPregunta could not be saved. Please, try again.'));
					} else {
						$this->Session->setFlash(__('The RespuestaPregunta has been saved.'));
					}


//					debug($consulta);
//					debug($respuestaPregunta);

				}


			}

			/*
				Registrar los Parametros actuales en Respuesta Parametros
			*/
			$this->loadModel('Parametro');
			$this->Parametro->recursive = 0;
			$this->loadModel('RespuestaParametro');
			$this->RespuestaParametro->recursive = -1;
			$parametros = $this->Parametro->find('all', array(
				'conditions' => array('Parametro.estado_id <>' => '2'),
				'recursive' => 0
			));
			foreach ($parametros as $key => $parametro) {
				$this->RespuestaParametro->create();
				$respuestaParametro['RespuestaParametro']['consulta_id'] = $consulta['Consulta']['id'];
				$respuestaParametro['RespuestaParametro']['parametro_id'] = $parametro['Parametro']['id'];
				$respuestaParametro['RespuestaParametro']['parametro'] = $parametro['Parametro']['nombre'];
				$respuestaParametro['RespuestaParametro']['valor'] = $parametro['Parametro']['valor'];
				$respuestaParametro['RespuestaParametro']['unidade_id'] = $parametro['Unidade']['id'];
				$respuestaParametro['RespuestaParametro']['unidad'] = $parametro['Unidade']['nombre'];
				$respuestaParametro['RespuestaParametro']['estado_id'] = 1;
				$respuestaParametro['RespuestaParametro']['user_created'] = $this->Authake->getUserId();
				$respuestaParametro['RespuestaParametro']['user_modified'] = $this->Authake->getUserId();
				if (!$this->RespuestaParametro->save($respuestaParametro)) {
					$this->Session->setFlash(__('The RespuestaParametro could not be saved. Please, try again.'));
				} else {
					$this->Session->setFlash(__('The RespuestaParametro has been saved.'));
				}
			}

			/*
				Registrar los Coeficientes actuales en Respuesta Coeficientes
			*/
			$this->loadModel('Coeficiente');
			$this->Coeficiente->recursive = 0;
			$this->loadModel('RespuestaCoeficiente');
			$this->RespuestaCoeficiente->recursive = -1;
			$coeficientes = $this->Coeficiente->find('all', array(
				'conditions' => array('Coeficiente.estado_id <>' => '2'),
				'recursive' => 0
			));
			foreach ($coeficientes as $key => $coeficiente) {
				$this->RespuestaCoeficiente->create();
				$respuestaCoeficiente['RespuestaCoeficiente']['consulta_id'] = $consulta['Consulta']['id'];
				$respuestaCoeficiente['RespuestaCoeficiente']['coeficiente_id'] = $coeficiente['Coeficiente']['id'];
				$respuestaCoeficiente['RespuestaCoeficiente']['coeficiente'] = $coeficiente['Coeficiente']['nombre'];
				$respuestaCoeficiente['RespuestaCoeficiente']['valor'] = 0;
				$respuestaCoeficiente['RespuestaCoeficiente']['minimo'] = $coeficiente['Coeficiente']['minimo'];
				$respuestaCoeficiente['RespuestaCoeficiente']['maximo'] = $coeficiente['Coeficiente']['maximo'];
//				$respuestaCoeficiente['RespuestaCoeficiente']['unidade_id'] = $coeficiente['Unidade']['id'];
//				$respuestaCoeficiente['RespuestaCoeficiente']['unidad'] = $coeficiente['Unidade']['nombre'];
				$respuestaCoeficiente['RespuestaCoeficiente']['estado_id'] = 1;
				$respuestaCoeficiente['RespuestaCoeficiente']['user_created'] = $this->Authake->getUserId();
				$respuestaCoeficiente['RespuestaCoeficiente']['user_modified'] = $this->Authake->getUserId();
				if (!$this->RespuestaCoeficiente->save($respuestaCoeficiente)) {
					$this->Session->setFlash(__('The RespuestaCoeficiente could not be saved. Please, try again.'));
				} else {
					$this->Session->setFlash(__('The RespuestaCoeficiente has been saved.'));
				}
			}


			/*
				Calcular Respuesta Multiplicadores, Ítems, Tipos y Consulta.
				Próxima mejora: Automatizar los cálculos para que sean de forma dinámica y no estática como se realiza actualmente.
			*/

				/************************ MULTIPLICADOR N°2 ************************/
				/* 1) ITEM1: COMBUSTIBLE - DETERMINACIÓN DEL COSTO DE COMBUSTIBLE: */
			//Parametro: PRECIO DE UN LITRO DE GASOIL LIBRE
			$parametro1 = $this->Parametro->find('first', array(
				'conditions' => array('Parametro.id' => '1'),
				'recursive' => 0
			));
			//Coeficiente: Consumo de Combustible
			$coeficiente1 = $this->Coeficiente->find('first', array(
				'conditions' => array('Coeficiente.id' => '1'),
				'recursive' => -1
			));
			$this->loadModel('Matrix');
			$this->Matrix->recursive = -1;
			$matrices = $this->Matrix->find('all', array(
				'conditions' => array('Matrix.estado_id <>' => '2', 'Matrix.coeficiente_id' => $coeficiente1['Coeficiente']['id']),
				'recursive' => -1
			));
			$coeficiente1['Coeficiente']['diferencia'] = $coeficiente1['Coeficiente']['maximo'] - $coeficiente1['Coeficiente']['minimo'];
			$coeficiente1['Coeficiente']['parcial_total'] = 0;
			$respuesta_opcion1 = $this->Opcione->find('first', array(
				'conditions' => array('Opcione.id' => $this->request->data['Consulta']['1']),
				'recursive' => 0
			));

			foreach ($matrices as $key => $matrix) {
				$coeficiente1['Coeficiente']['parcial_total'] = ($respuesta_opcion1['Opcione']['funcion'] * ($coeficiente1['Coeficiente']['diferencia']*$matrix['Matrix']['peso']/100));
			}
			$coeficiente1['Coeficiente']['total'] = $coeficiente1['Coeficiente']['maximo'] - $coeficiente1['Coeficiente']['parcial_total'];

			$this->loadModel('RespuestaItem');
			$this->RespuestaItem->recursive = -1;
			$this->loadModel('Item');
			$this->Item->recursive = -1;
			//Ítem: Combustible
			$item1 = $this->Item->find('first', array(
				'conditions' => array('Item.id' => '1'),
				'recursive' => -1
			));
			$respuestaItem1['RespuestaItem']['consulta_id'] = $consulta['Consulta']['id'];
			$respuestaItem1['RespuestaItem']['item_id'] = $item1['Item']['id'];
			$respuestaItem1['RespuestaItem']['item'] = $item1['Item']['nombre'];
			$respuestaItem1['RespuestaItem']['valor'] = $parametro1['Parametro']['valor'] * $coeficiente1['Coeficiente']['total'];
			$respuestaItem1['RespuestaItem']['incidencia_valor'] = 0;
			$respuestaItem1['RespuestaItem']['minimo'] = $parametro1['Parametro']['valor'] * $coeficiente1['Coeficiente']['minimo'];
			$respuestaItem1['RespuestaItem']['incidencia_minimo'] = 0;
			$respuestaItem1['RespuestaItem']['maximo'] = $parametro1['Parametro']['valor'] * $coeficiente1['Coeficiente']['maximo'];
			$respuestaItem1['RespuestaItem']['incidencia_maximo'] = 0;
			$respuestaItem1['RespuestaItem']['unidade_id'] = $parametro1['Unidade']['id'];
			$respuestaItem1['RespuestaItem']['unidad'] = $parametro1['Unidade']['nombre'];
			$respuestaItem1['RespuestaItem']['estado_id'] = 1;
			$respuestaItem1['RespuestaItem']['user_created'] = $this->Authake->getUserId();
			$respuestaItem1['RespuestaItem']['user_modified'] = $this->Authake->getUserId();
			if (!$this->RespuestaItem->save($respuestaItem1)) {
				$this->Session->setFlash(__('The RespuestaItem could not be saved. Please, try again.'));
			} else {
				$this->Session->setFlash(__('The RespuestaItem has been saved.'));
			}



//Hacer sumar por tipo (cada item tiene tipo)
















			/*
				Registrar los Indicadores actuales en Respuesta Indicadores
			*/

//			Hacer!


			$this->Session->setFlash(__('The consulta has been saved.'));
			return $this->redirect(array('action' => 'index'));
		}



		$preguntas = $this->Pregunta->find('all', array(
			'conditions' => array('Pregunta.estado_id <>' => '2'),
			'recursive' => -1,
			'fields' => array('Pregunta.id, Pregunta.pregunta')
		));



		foreach ($preguntas as $key => $pregunta) {
			$opciones = $this->Opcione->find('list', array(
				'conditions' => array('Opcione.estado_id <>' => '2', 'Opcione.pregunta_id' => $pregunta['Pregunta']['id']),
				'recursive' => 0,
				'fields' => array('Opcione.id', 'Opcione.nombre')
			));
			$preguntas[$key]['Pregunta']['opciones'] = $opciones;
		}

//		debug($preguntas);


		$estados = $this->Consulta->Estado->find('list');
		$this->set(compact('estados','preguntas'));
	}
}
