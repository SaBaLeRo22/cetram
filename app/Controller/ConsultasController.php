<?php
App::uses('AppController', 'Controller');

/**
 * Consultas Controller
 *
 * @property Consulta $Consulta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ConsultasController extends AppController
{

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
    public function index()
    {
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
    public function view($id = null)
    {
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
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Consulta->create();
            if ($this->Consulta->save($this->request->data)) {
                $this->Session->setFlash(__('The consulta has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
            }
        }
        $unidades = $this->Consulta->Unidade->find('list');
        $modos = $this->Consulta->Modo->find('list');
        $estados = $this->Consulta->Estado->find('list');
        $localidades = $this->Consulta->Localidade->find('list');
        $this->set(compact('unidades', 'modos', 'estados','localidades'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
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
        $unidades = $this->Consulta->Unidade->find('list');
        $modos = $this->Consulta->Modo->find('list');
        $estados = $this->Consulta->Estado->find('list');
        $localidades = $this->Consulta->Localidade->find('list');
        $this->set(compact('unidades', 'modos', 'estados', 'localidades'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
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
     * uno method
     *
     *
     */
    public function uno()
    {
        if ($this->request->is('post')) {

            $this->loadModel('Pregunta');
            $this->Pregunta->recursive = -1;
            $this->loadModel('Opcione');
            $this->Opcione->recursive = -1;

            $this->Consulta->create();

            $consulta['Consulta']['costo'] = 0;
            $consulta['Consulta']['tarifa'] = 0;
            $consulta['Consulta']['subsidio'] = 0;
            $consulta['Consulta']['unidade_id'] = 8; // Pesos ($)
            $consulta['Consulta']['localidade_id'] = $this->Authake->getLocalidadId();
//            $consulta['Consulta']['observaciones'] = $this->request->data['Consulta']['observaciones'];
            $consulta['Consulta']['modo_id'] = 2; // Incompleta: Pantalla "Uno" es la �ltima pantalla completa.
            $consulta['Consulta']['estado_id'] = 1; // Activo
            $consulta['Consulta']['user_created'] = $this->Authake->getUserId();
            $consulta['Consulta']['user_modified'] = $this->Authake->getUserId();

            if (!$this->Consulta->save($consulta)) {
                $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
            }

            $consulta['Consulta']['id'] = $this->Consulta->id;

            $this->loadModel('Coeficiente');
            $this->Coeficiente->recursive = 0;
            $this->loadModel('RespuestaCoeficiente');
            $this->RespuestaCoeficiente->recursive = -1;
            $this->loadModel('Matrix');
            $this->Matrix->recursive = -1;
            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;

            /*
            COEFICIENTES / PREGUNTAS
            */
            $preguntasRegistradas['0'] = 0;
            $coeficientes = $this->Coeficiente->find('all', array(
                'conditions' => array('Coeficiente.estado_id <>' => '2'),
                'recursive' => 0
            ));
            foreach ($coeficientes as $coef => $coeficiente) {

                $coeficiente['Coeficiente']['diferencia'] = $coeficiente['Coeficiente']['maximo'] - $coeficiente['Coeficiente']['minimo'];
                $coeficiente['Coeficiente']['parcial_total'] = 0;

                $matrices = $this->Matrix->find('all', array(
                    'conditions' => array('Matrix.estado_id <>' => '2', 'Matrix.coeficiente_id' => $coeficiente['Coeficiente']['id']),
                    'recursive' => -1
                ));

                foreach ($matrices as $key => $matrix) {
                    $preguntas = $this->Pregunta->find('all', array(
                        'conditions' => array('Pregunta.multiplicadore_id' => $matrix['Matrix']['multiplicadore_id']),
                        'recursive' => 0
                    ));
                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 1;
                    foreach ($preguntas as $preg => $pregunta) {

                        if ($pregunta['Pregunta']['opciones'] == '1') {
                            $respuesta_opcion = $this->Opcione->find('first', array(
                                'conditions' => array('Opcione.id' => $this->request->data['Consulta'][$pregunta['Pregunta']['id']]),
                                'recursive' => 0
                            ));
                            if (!empty($respuesta_opcion)) {
                                if (!in_array($pregunta['Pregunta']['id'], $preguntasRegistradas)) {
                                    $this->RespuestaPregunta->create();
                                    $respuestaPregunta['RespuestaPregunta']['consulta_id'] = $consulta['Consulta']['id'];
                                    $respuestaPregunta['RespuestaPregunta']['pregunta_id'] = $pregunta['Pregunta']['id'];
                                    $respuestaPregunta['RespuestaPregunta']['pregunta'] = $pregunta['Pregunta']['pregunta'];
                                    $respuestaPregunta['RespuestaPregunta']['valor'] = $respuesta_opcion['Opcione']['funcion'];
                                    $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                                    $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
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
                                    $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];
                                }
                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] * $respuesta_opcion['Opcione']['funcion'];
                            }
                        } else {
                            if (!in_array($pregunta['Pregunta']['id'], $preguntasRegistradas)) {
                                $this->RespuestaPregunta->create();
                                $respuestaPregunta['RespuestaPregunta']['consulta_id'] = $consulta['Consulta']['id'];
                                $respuestaPregunta['RespuestaPregunta']['pregunta_id'] = $pregunta['Pregunta']['id'];
                                $respuestaPregunta['RespuestaPregunta']['pregunta'] = $pregunta['Pregunta']['pregunta'];
                                $respuestaPregunta['RespuestaPregunta']['valor'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                                $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                                $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
                                $respuestaPregunta['RespuestaPregunta']['unidade_id'] = $pregunta['Pregunta']['unidade_id'];
                                $respuestaPregunta['RespuestaPregunta']['unidad'] = $pregunta['Unidade']['nombre'];
                                $respuestaPregunta['RespuestaPregunta']['respuesta'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                                $respuestaPregunta['RespuestaPregunta']['funcion'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                                $respuestaPregunta['RespuestaPregunta']['estado_id'] = 1;
                                $respuestaPregunta['RespuestaPregunta']['user_created'] = $this->Authake->getUserId();
                                $respuestaPregunta['RespuestaPregunta']['user_modified'] = $this->Authake->getUserId();

                                if (!$this->RespuestaPregunta->save($respuestaPregunta)) {
                                    $this->Session->setFlash(__('The RespuestaPregunta could not be saved. Please, try again.'));
                                } else {
                                    $this->Session->setFlash(__('The RespuestaPregunta has been saved.'));
                                }
                                $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];
                            }
                            if ($pregunta['Pregunta']['id'] == '5') {
                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] * (-0.0076 * pow($this->request->data['Consulta'][$pregunta['Pregunta']['id']] + 1, 2) + 0.0223 * ($this->request->data['Consulta'][$pregunta['Pregunta']['id']] + 1) + 0.9859);
                            }
                        }
                    }
                    $coeficiente['Coeficiente']['parcial_total'] = $coeficiente['Coeficiente']['parcial_total'] + (($coeficiente['Coeficiente']['diferencia'] * $matrix['Matrix']['peso'] / 100) * $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']]);
                }
                $coeficiente['Coeficiente']['total'] = $coeficiente['Coeficiente']['maximo'] - $coeficiente['Coeficiente']['parcial_total'];

                $this->RespuestaCoeficiente->create();
                $respuestaCoeficiente['RespuestaCoeficiente']['consulta_id'] = $consulta['Consulta']['id'];
                $respuestaCoeficiente['RespuestaCoeficiente']['coeficiente_id'] = $coeficiente['Coeficiente']['id'];
                $respuestaCoeficiente['RespuestaCoeficiente']['coeficiente'] = $coeficiente['Coeficiente']['nombre'];
                $respuestaCoeficiente['RespuestaCoeficiente']['valor'] = $coeficiente['Coeficiente']['total'];
                $respuestaCoeficiente['RespuestaCoeficiente']['minimo'] = $coeficiente['Coeficiente']['minimo'];
                $respuestaCoeficiente['RespuestaCoeficiente']['maximo'] = $coeficiente['Coeficiente']['maximo'];
                $respuestaCoeficiente['RespuestaCoeficiente']['estado_id'] = 1;
                $respuestaCoeficiente['RespuestaCoeficiente']['user_created'] = $this->Authake->getUserId();
                $respuestaCoeficiente['RespuestaCoeficiente']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaCoeficiente->save($respuestaCoeficiente)) {
                    $this->Session->setFlash(__('The RespuestaCoeficiente could not be saved. Please, try again.'));
                } else {
                    $this->Session->setFlash(__('The RespuestaCoeficiente has been saved.'));
                }
            }

            $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 1". Por favor, continuar con el "Paso 2".'));
            return $this->redirect(array('action' => 'dos', $consulta['Consulta']['id']));

        }
        /*
                $verificacion = $this->Consulta->find('first', array(
                    'conditions' => array('Consulta.estado_id <>' => '2', 'Consulta.user_created' => $this->Authake->getUserId()),
                    'recursive' => -1,
                    'order' => array('Consulta.id' => 'desc')
                ));

                if (!empty($verificacion)) {
                    if ($verificacion['Consulta']['modo_id'] == '2') {
                        return $this->redirect(array('action' => 'dos', $verificacion['Consulta']['id']));
                    }
                }
        */

        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;

        /*
        PREGUNTAS
        */
        $preguntas = $this->Pregunta->find('all', array(
            'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '2'),
            'recursive' => -1,
            'order' => array('Pregunta.orden' => 'asc')
        ));

        foreach ($preguntas as $key => $pregunta) {
            $opciones = $this->Opcione->find('all', array(
                'conditions' => array('Opcione.estado_id <>' => '2', 'Opcione.pregunta_id' => $pregunta['Pregunta']['id']),
                'recursive' => 0,
                'fields' => array('Opcione.id', 'Opcione.opcion', 'Unidade.id', 'Unidade.nombre')
            ));
            $ops = NULL;
            foreach ($opciones as $keyo => $opcion) {

                if ($opcion['Unidade']['id'] <> '17') { // Con Unidades
                    $ops[$opcion['Opcione']['id']] = $opcion['Opcione']['opcion'] . ' ' . $opcion['Unidade']['nombre'];
                } else { // Sin Unidades
                    $ops[$opcion['Opcione']['id']] = $opcion['Opcione']['opcion'];
                }
            }
            $preguntas[$key]['Pregunta']['opciones'] = $ops;
        }

        $this->set(compact('preguntas'));


    }

    /**
     * editaruno method
     *
     *
     */
    public function editaruno($id = null)
    {

        if ($this->request->is('post')) {

            $this->loadModel('Pregunta');
            $this->Pregunta->recursive = -1;
            $this->loadModel('Opcione');
            $this->Opcione->recursive = -1;

            $consulta['Consulta']['id'] = $this->request->data['Consulta']['consulta_id'];

            $this->loadModel('Parametro');
            $this->Parametro->recursive = 0;
            $this->loadModel('RespuestaParametro');
            $this->RespuestaParametro->recursive = -1;
            $this->loadModel('Coeficiente');
            $this->Coeficiente->recursive = 0;
            $this->loadModel('RespuestaCoeficiente');
            $this->RespuestaCoeficiente->recursive = -1;
            $this->loadModel('Matrix');
            $this->Matrix->recursive = -1;
            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;

            /*
            PARAMETROS
            */
            $parametros = $this->Parametro->find('all', array(
                'conditions' => array('Parametro.estado_id <>' => '2'),
                'recursive' => 0
            ));
            foreach ($parametros as $key => $parametro) {

                $respuestaParametro = $this->RespuestaParametro->find('first', array(
                    'conditions' => array('RespuestaParametro.consulta_id' => $consulta['Consulta']['id'], 'RespuestaParametro.parametro_id' => $parametro['Parametro']['id']),
                    'recursive' => -1,
                ));

                $respuestaParametro['RespuestaParametro']['parametro'] = $parametro['Parametro']['nombre'];
                $respuestaParametro['RespuestaParametro']['valor'] = $parametro['Parametro']['valor'];
                $respuestaParametro['RespuestaParametro']['unidade_id'] = $parametro['Unidade']['id'];
                $respuestaParametro['RespuestaParametro']['unidad'] = $parametro['Unidade']['nombre'];
                $respuestaParametro['RespuestaParametro']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaParametro->save($respuestaParametro)) {
                    $this->Session->setFlash(__('The RespuestaParametro could not be saved. Please, try again.'));
                } else {
                    $this->Session->setFlash(__('The RespuestaParametro has been saved.'));
                }
            }

            /*
            COEFICIENTES / PREGUNTAS
            */
            $preguntasRegistradas['0'] = 0;
            $coeficientes = $this->Coeficiente->find('all', array(
                'conditions' => array('Coeficiente.estado_id <>' => '2'),
                'recursive' => 0
            ));
            foreach ($coeficientes as $coef => $coeficiente) {

                $coeficiente['Coeficiente']['diferencia'] = $coeficiente['Coeficiente']['maximo'] - $coeficiente['Coeficiente']['minimo'];
                $coeficiente['Coeficiente']['parcial_total'] = 0;

                $matrices = $this->Matrix->find('all', array(
                    'conditions' => array('Matrix.estado_id <>' => '2', 'Matrix.coeficiente_id' => $coeficiente['Coeficiente']['id']),
                    'recursive' => -1
                ));

                foreach ($matrices as $key => $matrix) {
                    $preguntas = $this->Pregunta->find('all', array(
                        'conditions' => array('Pregunta.multiplicadore_id' => $matrix['Matrix']['multiplicadore_id']),
                        'recursive' => 0
                    ));
                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 1;
                    foreach ($preguntas as $preg => $pregunta) {

                        if ($pregunta['Pregunta']['opciones'] == '1') {
                            $respuesta_opcion = $this->Opcione->find('first', array(
                                'conditions' => array('Opcione.id' => $this->request->data['Consulta'][$pregunta['Pregunta']['id']]),
                                'recursive' => 0
                            ));
                            if (!empty($respuesta_opcion)) {
                                if (!in_array($pregunta['Pregunta']['id'], $preguntasRegistradas)) {

                                    $respuestaPregunta = $this->RespuestaPregunta->find('first', array(
                                        'conditions' => array('RespuestaPregunta.consulta_id' => $consulta['Consulta']['id'], 'RespuestaPregunta.pregunta_id' => $pregunta['Pregunta']['id']),
                                        'recursive' => -1,
                                    ));

                                    $respuestaPregunta['RespuestaPregunta']['pregunta'] = $pregunta['Pregunta']['pregunta'];
                                    $respuestaPregunta['RespuestaPregunta']['valor'] = $respuesta_opcion['Opcione']['funcion'];
                                    $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                                    $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
                                    $respuestaPregunta['RespuestaPregunta']['unidade_id'] = $respuesta_opcion['Pregunta']['unidade_id'];
                                    $respuestaPregunta['RespuestaPregunta']['unidad'] = $respuesta_opcion['Unidade']['nombre'];
                                    $respuestaPregunta['RespuestaPregunta']['respuesta'] = $respuesta_opcion['Opcione']['opcion'];
                                    $respuestaPregunta['RespuestaPregunta']['opcione_id'] = $respuesta_opcion['Opcione']['id'];
                                    $respuestaPregunta['RespuestaPregunta']['funcion'] = $respuesta_opcion['Opcione']['funcion'];
                                    $respuestaPregunta['RespuestaPregunta']['user_modified'] = $this->Authake->getUserId();

                                    if (!$this->RespuestaPregunta->save($respuestaPregunta)) {
                                        $this->Session->setFlash(__('The RespuestaPregunta could not be saved. Please, try again.'));
                                    } else {
                                        $this->Session->setFlash(__('The RespuestaPregunta has been saved.'));
                                    }
                                    $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];
                                }
                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] * $respuesta_opcion['Opcione']['funcion'];
                            }
                        } else {
                            if (!in_array($pregunta['Pregunta']['id'], $preguntasRegistradas)) {

                                $respuestaPregunta = $this->RespuestaPregunta->find('first', array(
                                    'conditions' => array('RespuestaPregunta.consulta_id' => $consulta['Consulta']['id'], 'RespuestaPregunta.pregunta_id' => $pregunta['Pregunta']['id']),
                                    'recursive' => -1,
                                ));

                                $respuestaPregunta['RespuestaPregunta']['pregunta'] = $pregunta['Pregunta']['pregunta'];
                                $respuestaPregunta['RespuestaPregunta']['valor'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                                $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                                $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
                                $respuestaPregunta['RespuestaPregunta']['unidade_id'] = $pregunta['Pregunta']['unidade_id'];
                                $respuestaPregunta['RespuestaPregunta']['unidad'] = $pregunta['Unidade']['nombre'];
                                $respuestaPregunta['RespuestaPregunta']['respuesta'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                                $respuestaPregunta['RespuestaPregunta']['funcion'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                                $respuestaPregunta['RespuestaPregunta']['user_modified'] = $this->Authake->getUserId();

                                if (!$this->RespuestaPregunta->save($respuestaPregunta)) {
                                    $this->Session->setFlash(__('The RespuestaPregunta could not be saved. Please, try again.'));
                                } else {
                                    $this->Session->setFlash(__('The RespuestaPregunta has been saved.'));
                                }
                                $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];
                            }
                            if ($pregunta['Pregunta']['id'] == '5') {
                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] * (-0.0076 * pow($this->request->data['Consulta'][$pregunta['Pregunta']['id']] + 1, 2) + 0.0223 * ($this->request->data['Consulta'][$pregunta['Pregunta']['id']] + 1) + 0.9859);
                            }
                        }
                    }
                    $coeficiente['Coeficiente']['parcial_total'] = $coeficiente['Coeficiente']['parcial_total'] + (($coeficiente['Coeficiente']['diferencia'] * $matrix['Matrix']['peso'] / 100) * $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']]);
                }
                $coeficiente['Coeficiente']['total'] = $coeficiente['Coeficiente']['maximo'] - $coeficiente['Coeficiente']['parcial_total'];

                $respuestaCoeficiente = $this->RespuestaCoeficiente->find('first', array(
                    'conditions' => array('RespuestaCoeficiente.consulta_id' => $consulta['Consulta']['id'], 'RespuestaCoeficiente.coeficiente_id' => $coeficiente['Coeficiente']['id']),
                    'recursive' => -1,
                ));

                $respuestaCoeficiente['RespuestaCoeficiente']['coeficiente'] = $coeficiente['Coeficiente']['nombre'];
                $respuestaCoeficiente['RespuestaCoeficiente']['valor'] = $coeficiente['Coeficiente']['total'];
                $respuestaCoeficiente['RespuestaCoeficiente']['minimo'] = $coeficiente['Coeficiente']['minimo'];
                $respuestaCoeficiente['RespuestaCoeficiente']['maximo'] = $coeficiente['Coeficiente']['maximo'];
                $respuestaCoeficiente['RespuestaCoeficiente']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaCoeficiente->save($respuestaCoeficiente)) {
                    $this->Session->setFlash(__('The RespuestaCoeficiente could not be saved. Please, try again.'));
                } else {
                    $this->Session->setFlash(__('The RespuestaCoeficiente has been saved.'));
                }
            }

            $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 1". Por favor, continuar con el "Paso 2".'));
            return $this->redirect(array('action' => 'dos', $consulta['Consulta']['id']));

        }

        if (!$this->Consulta->exists($id)) {
            if (!$this->Consulta->exists($this->request->data['Consulta']['consulta_id'])) {
                $this->Session->setFlash(__('No existe consulta asociada.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $id = $this->request->data['Consulta']['consulta_id'];
            }
        }

        $consulta = $this->Consulta->find('first', array(
            'conditions' => array('Consulta.id' => $id, 'Consulta.estado_id <>' => '2', 'Consulta.modo_id <>' => '1', 'Consulta.user_created' => $this->Authake->getUserId()),
            'recursive' => -1,
        ));

        if (empty($consulta)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }

        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;
        $this->loadModel('RespuestaPregunta');
        $this->Opcione->RespuestaPregunta = -1;

        /*
        PREGUNTAS
        */
        $preguntas = $this->Pregunta->find('all', array(
            'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '2'),
            'recursive' => -1,
            'order' => array('Pregunta.orden' => 'asc')
        ));

        foreach ($preguntas as $key => $pregunta) {
            $opciones = $this->Opcione->find('all', array(
                'conditions' => array('Opcione.estado_id <>' => '2', 'Opcione.pregunta_id' => $pregunta['Pregunta']['id']),
                'recursive' => 0,
                'fields' => array('Opcione.id', 'Opcione.opcion', 'Unidade.id', 'Unidade.nombre')
            ));
            $ops = NULL;
            foreach ($opciones as $keyo => $opcion) {

                if ($opcion['Unidade']['id'] <> '17') { // Con Unidades
                    $ops[$opcion['Opcione']['id']] = $opcion['Opcione']['opcion'] . ' ' . $opcion['Unidade']['nombre'];
                } else { // Sin Unidades
                    $ops[$opcion['Opcione']['id']] = $opcion['Opcione']['opcion'];
                }
            }
            $preguntas[$key]['Pregunta']['opciones'] = $ops;
            $respuestaPregunta = $this->RespuestaPregunta->find('first', array(
                'conditions' => array('RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.pregunta_id' => $pregunta['Pregunta']['id']),
                'recursive' => -1,
            ));

            if ($pregunta['Pregunta']['tipo'] == 'select') {
                $this->request->data['Consulta'][$pregunta['Pregunta']['id']] = $respuestaPregunta['RespuestaPregunta']['opcione_id'];
            } else {
                $this->request->data['Consulta'][$pregunta['Pregunta']['id']] = $respuestaPregunta['RespuestaPregunta']['respuesta'];
            }

        }
        $this->request->data['Consulta']['consulta_id'] = $id;
        $this->set(compact('preguntas'));

    }

    public function dos($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;

        if ($this->request->is('post')) {

            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;

            $consulta['Consulta']['id'] = $this->request->data['Consulta']['consulta_id'];

            $preguntas = $this->Pregunta->find('all', array(
                'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '3'),
                'recursive' => 0,
                'order' => array('Pregunta.orden' => 'asc')
            ));

            foreach ($preguntas as $preg => $pregunta) {

                if ($pregunta['Pregunta']['opciones'] == '1') {
                    $respuesta_opcion = $this->Opcione->find('first', array(
                        'conditions' => array('Opcione.id' => $this->request->data['Consulta'][$pregunta['Pregunta']['id']]),
                        'recursive' => 0
                    ));
                    if (!empty($respuesta_opcion)) {

                        $this->RespuestaPregunta->create();
                        $respuestaPregunta['RespuestaPregunta']['consulta_id'] = $consulta['Consulta']['id'];
                        $respuestaPregunta['RespuestaPregunta']['pregunta_id'] = $pregunta['Pregunta']['id'];
                        $respuestaPregunta['RespuestaPregunta']['pregunta'] = $pregunta['Pregunta']['pregunta'];
                        $respuestaPregunta['RespuestaPregunta']['valor'] = $respuesta_opcion['Opcione']['funcion'];
                        $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                        $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
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
                        $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];

                    }
                } else {

                    $this->RespuestaPregunta->create();
                    $respuestaPregunta['RespuestaPregunta']['consulta_id'] = $consulta['Consulta']['id'];
                    $respuestaPregunta['RespuestaPregunta']['pregunta_id'] = $pregunta['Pregunta']['id'];
                    $respuestaPregunta['RespuestaPregunta']['pregunta'] = $pregunta['Pregunta']['pregunta'];
                    $respuestaPregunta['RespuestaPregunta']['valor'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                    $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
                    $respuestaPregunta['RespuestaPregunta']['unidade_id'] = $pregunta['Pregunta']['unidade_id'];
                    $respuestaPregunta['RespuestaPregunta']['unidad'] = $pregunta['Unidade']['nombre'];
                    $respuestaPregunta['RespuestaPregunta']['respuesta'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['funcion'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['estado_id'] = 1;
                    $respuestaPregunta['RespuestaPregunta']['user_created'] = $this->Authake->getUserId();
                    $respuestaPregunta['RespuestaPregunta']['user_modified'] = $this->Authake->getUserId();

                    if (!$this->RespuestaPregunta->save($respuestaPregunta)) {
                        $this->Session->setFlash(__('The RespuestaPregunta could not be saved. Please, try again.'));
                    } else {
                        $this->Session->setFlash(__('The RespuestaPregunta has been saved.'));
                    }
                    $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];

                }
            }

            return $this->redirect(array('action' => 'cinco', $consulta['Consulta']['id']));
        }

        /*
        PREGUNTAS
        */
        $preguntas = $this->Pregunta->find('all', array(
            'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '3'),
            'recursive' => -1,
            'order' => array('Pregunta.orden' => 'asc')
        ));

        foreach ($preguntas as $key => $pregunta) {
            $opciones = $this->Opcione->find('all', array(
                'conditions' => array('Opcione.estado_id <>' => '2', 'Opcione.pregunta_id' => $pregunta['Pregunta']['id']),
                'recursive' => 0,
                'fields' => array('Opcione.id', 'Opcione.opcion', 'Unidade.id', 'Unidade.nombre')
            ));
            $ops = NULL;
            foreach ($opciones as $keyo => $opcion) {

                if ($opcion['Unidade']['id'] <> '17') { // Con Unidades
                    $ops[$opcion['Opcione']['id']] = $opcion['Opcione']['opcion'] . ' ' . $opcion['Unidade']['nombre'];
                } else { // Sin Unidades
                    $ops[$opcion['Opcione']['id']] = $opcion['Opcione']['opcion'];
                }
            }
            $preguntas[$key]['Pregunta']['opciones'] = $ops;
        }
        $this->request->data['Consulta']['consulta_id'] = $id;
        $this->set(compact('consulta', 'preguntas'));
    }

    public function editardos($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;

        if ($this->request->is('post')) {

            $consulta['Consulta']['id'] = $this->request->data['Consulta']['consulta_id'];

            $preguntas = $this->Pregunta->find('all', array(
                'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '3'),
                'recursive' => 0,
                'order' => array('Pregunta.orden' => 'asc')
            ));

            foreach ($preguntas as $preg => $pregunta) {

                if ($pregunta['Pregunta']['opciones'] == '1') {
                    $respuesta_opcion = $this->Opcione->find('first', array(
                        'conditions' => array('Opcione.id' => $this->request->data['Consulta'][$pregunta['Pregunta']['id']]),
                        'recursive' => 0
                    ));
                    if (!empty($respuesta_opcion)) {

                        $respuestaPregunta = $this->RespuestaPregunta->find('first', array(
                            'conditions' => array('RespuestaPregunta.consulta_id' => $consulta['Consulta']['id'], 'RespuestaPregunta.pregunta_id' => $pregunta['Pregunta']['id']),
                            'recursive' => -1,
                        ));

                        $respuestaPregunta['RespuestaPregunta']['pregunta'] = $pregunta['Pregunta']['pregunta'];
                        $respuestaPregunta['RespuestaPregunta']['valor'] = $respuesta_opcion['Opcione']['funcion'];
                        $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                        $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
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
                        $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];

                    }
                } else {

                    $respuestaPregunta = $this->RespuestaPregunta->find('first', array(
                        'conditions' => array('RespuestaPregunta.consulta_id' => $consulta['Consulta']['id'], 'RespuestaPregunta.pregunta_id' => $pregunta['Pregunta']['id']),
                        'recursive' => -1,
                    ));

                    $respuestaPregunta['RespuestaPregunta']['pregunta'] = $pregunta['Pregunta']['pregunta'];
                    $respuestaPregunta['RespuestaPregunta']['valor'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                    $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
                    $respuestaPregunta['RespuestaPregunta']['unidade_id'] = $pregunta['Pregunta']['unidade_id'];
                    $respuestaPregunta['RespuestaPregunta']['unidad'] = $pregunta['Unidade']['nombre'];
                    $respuestaPregunta['RespuestaPregunta']['respuesta'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['funcion'] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['estado_id'] = 1;
                    $respuestaPregunta['RespuestaPregunta']['user_created'] = $this->Authake->getUserId();
                    $respuestaPregunta['RespuestaPregunta']['user_modified'] = $this->Authake->getUserId();

                    if (!$this->RespuestaPregunta->save($respuestaPregunta)) {
                        $this->Session->setFlash(__('The RespuestaPregunta could not be saved. Please, try again.'));
                    } else {
                        $this->Session->setFlash(__('The RespuestaPregunta has been saved.'));
                    }
                    $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];

                }
            }

            return $this->redirect(array('action' => 'cinco', $consulta['Consulta']['id']));
        }

        /*
        PREGUNTAS
        */
        $preguntas = $this->Pregunta->find('all', array(
            'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '3'),
            'recursive' => -1,
            'order' => array('Pregunta.orden' => 'asc')
        ));

        foreach ($preguntas as $key => $pregunta) {
            $opciones = $this->Opcione->find('all', array(
                'conditions' => array('Opcione.estado_id <>' => '2', 'Opcione.pregunta_id' => $pregunta['Pregunta']['id']),
                'recursive' => 0,
                'fields' => array('Opcione.id', 'Opcione.opcion', 'Unidade.id', 'Unidade.nombre')
            ));
            $ops = NULL;
            foreach ($opciones as $keyo => $opcion) {

                if ($opcion['Unidade']['id'] <> '17') { // Con Unidades
                    $ops[$opcion['Opcione']['id']] = $opcion['Opcione']['opcion'] . ' ' . $opcion['Unidade']['nombre'];
                } else { // Sin Unidades
                    $ops[$opcion['Opcione']['id']] = $opcion['Opcione']['opcion'];
                }
            }
            $preguntas[$key]['Pregunta']['opciones'] = $ops;
            $respuestaPregunta = $this->RespuestaPregunta->find('first', array(
                'conditions' => array('RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.pregunta_id' => $pregunta['Pregunta']['id']),
                'recursive' => -1,
            ));

            if ($pregunta['Pregunta']['tipo'] == 'select') {
                $this->request->data['Consulta'][$pregunta['Pregunta']['id']] = $respuestaPregunta['RespuestaPregunta']['opcione_id'];
            } else {
                $this->request->data['Consulta'][$pregunta['Pregunta']['id']] = $respuestaPregunta['RespuestaPregunta']['respuesta'];
            }

        }
        $this->request->data['Consulta']['consulta_id'] = $id;
        $this->set(compact('consulta', 'preguntas'));
    }

    public function tres($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('RespuestaPasajero');
        $this->RespuestaPasajero->recursive = -1;

        if ($this->request->is('post')) {
//            debug($this->request->data);

            if($this->request->data['accion'] == '1'){
                /*************************************
                SIGUIENTE PASO
                *************************************/
                debug($this->request->data);

            }elseif($this->request->data['accion'] == '2'){
                /******************************************
                AGREGAR TARIFA
                ******************************************/

                $RespuestaPasajero['RespuestaPasajero']['consulta_id'] = $this->request->data['Consulta']['consulta_id'];
                $RespuestaPasajero['RespuestaPasajero']['sube'] = $this->request->data['Consulta']['sube'];
                $RespuestaPasajero['RespuestaPasajero']['tarifa'] = $this->request->data['Consulta']['tarifa'];
                $RespuestaPasajero['RespuestaPasajero']['base'] = $this->request->data['Consulta']['base'];
                $RespuestaPasajero['RespuestaPasajero']['costo'] = $this->request->data['Consulta']['costo'];
                $RespuestaPasajero['RespuestaPasajero']['estado_id'] = '1';
                $RespuestaPasajero['RespuestaPasajero']['user_created'] = $this->Authake->getUserId();
                $RespuestaPasajero['RespuestaPasajero']['user_modified'] = $this->Authake->getUserId();

                if($this->request->data['Consulta']['sube'] == '1'){ // SI tiene SUBE

                }elseif($this->request->data['Consulta']['sube'] == '0'){ // NO tiene SUBE
                    $RespuestaPasajero['RespuestaPasajero']['semestre1'] = $this->request->data['Consulta']['semestre1'];
                    $RespuestaPasajero['RespuestaPasajero']['semestre2'] = $this->request->data['Consulta']['semestre2'];
                }
                $this->RespuestaPasajero->create();
                if ($this->RespuestaPasajero->save($RespuestaPasajero)) {
                    $this->Session->setFlash(__('Tarifa agreada correctamente.'));
                    return $this->redirect(array('action' => 'tres', $this->request->data['Consulta']['consulta_id']));
                } else {
                    $this->Session->setFlash(__('Tarifa no se pudo agregar. Por favor, intente nuevamente.'));
                }

            }




        }
        $this->request->data['Consulta']['consulta_id'] = $id;

        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;
        $sube = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.pregunta_id' => '23'),
            'recursive' => -1
        ));
        //opcione_id = 24 --> SI; opcione_id = 25 --> NO
        if($sube['RespuestaPregunta']['opcione_id'] == '24'){
            $tiene = '1';
            $this->request->data['Consulta']['sube'] = '1';
        }else{
            $tiene = '0';
            $this->request->data['Consulta']['sube'] = '0';
        }

        $pasajeros = $this->RespuestaPasajero->find('all', array(
            'conditions' => array('RespuestaPasajero.consulta_id' => $id, 'RespuestaPasajero.sube' => $tiene, 'RespuestaPasajero.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->set(compact('consulta', 'pasajeros', 'tiene'));
    }

    public function cuatro($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        if ($this->request->is('post')) {
            debug($this->request->data);
        }

        $this->loadModel('Convenio');
        $this->Convenio->recursive =-1;
        $convenio = $this->Convenio->find('first', array(
            'order' => array('Convenio.fin' => 'desc'),
            'recursive' => -1
        ));
        $this->loadModel('Salario');
        $this->Salario->recursive = 0;
        $salarios = $this->Salario->find('all', array(
            'conditions' => array('Salario.convenio_id' => $convenio['Convenio']['id'], 'Salario.estado_id <>' => '2'),
            'order' => array('Categoria.nombre' => 'asc'),
            'recursive' => 0
        ));

        $this->request->data['Consulta']['consulta_id'] = $id;

        $this->set(compact('consulta','salarios','convenio'));
    }

    public function cinco($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;

        if ($this->request->is('post')) {

            $consulta['Consulta']['id'] = $this->request->data['Consulta']['consulta_id'];

            $this->loadModel('Parametro');
            $this->Parametro->recursive = 0;
            $this->loadModel('RespuestaParametro');
            $this->RespuestaParametro->recursive = -1;

            /*
            PARAMETROS
            */
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

            debug($this->request->data);
//            return $this->redirect(array('action' => 'view', $consulta['Consulta']['id']));

        } else {

        }

        $this->loadModel('Provincia');
        $this->Provincia->recursive = -1;
        $provincias = $this->Provincia->find('list', array(
            'fields' => array('Provincia.id','Provincia.nombre'),
            'conditions' => array('Provincia.nombre <>' => '', 'Provincia.estado_id' => '1'),
            'order' => array('Provincia.nombre' => 'asc')
        ));

        $this->loadModel('Localidade');
        $this->Localidade->recursive = 0;
        $localidad = $this->Localidade->find('first', array(
            'conditions' => array('Localidade.id' => $this->Authake->getLocalidadId()),
            'recursive' => 0,
        ));

        $this->request->data['Consulta']['consulta_id'] = $id;
        $this->set(compact('consulta', 'provincias', 'preguntas', 'localidad'));
    }

    function obtener_localidades($id = null) {
        Configure::write('debug', '0');
        $this->layout = 'ajax';
        $this->loadModel('Localidade');
        $this->Localidade->recursive = -1;
        $locs = $this->Localidade->find('all', array(
            'recursive' => -1,
            'fields' => array('id AS id, concat(nombre," (",codigopostal,")") as nombre'),
            'conditions' => array('Localidade.provincia_id' => $id,'Localidade.nombre <>' => '', 'Localidade.estado_id' => '1'),
            'order' => array('Localidade.nombre' => 'asc')));

        $localidades = array();
        foreach ($locs as $key => $localidad) {
            $localidades[$localidad['Localidade']['id']] = str_replace('?', '�', $localidad[0]['nombre']);
        }

        $this->set('localidades', $localidades);
    }
}
