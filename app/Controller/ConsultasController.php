<?php
App::uses('AppController', 'Controller');

/**
 * Consultas Controller
 *
 * @property Consulta $Consulta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */

App::import('Vendor', 'JBZoo/Utils/Vars');
//App::import('Vendor', 'Utils', array('file' => 'JBZoo' . DS . 'Utils' . DS . 'Vars.php'));

//App::uses('Vars','Lib');

class ConsultasController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Consulta->recursive = 0;
        $this->paginate = array(
            'conditions' => array('Consulta.estado_id <>' => '2', 'Consulta.user_created' => $this->Authake->getUserId()),
            'limit' => 10,
            'order' => array('id' => 'desc')
        );
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
        $this->set(compact('unidades', 'modos', 'estados', 'localidades'));
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
            $consulta['Consulta']['costo_minimo'] = 0;
            $consulta['Consulta']['costo_maximo'] = 0;
            $consulta['Consulta']['costo_inferior'] = 0;
            $consulta['Consulta']['costo_superior'] = 0;
            $consulta['Consulta']['tarifa'] = 0;
            $consulta['Consulta']['tarifa_minima'] = 0;
            $consulta['Consulta']['tarifa_maxima'] = 0;
            $consulta['Consulta']['tarifa_inferior'] = 0;
            $consulta['Consulta']['tarifa_superior'] = 0;
            $consulta['Consulta']['subsidio'] = 0;
            $consulta['Consulta']['subsidio_minimo'] = 0;
            $consulta['Consulta']['subsidio_maximo'] = 0;
            $consulta['Consulta']['subsidio_inferior'] = 0;
            $consulta['Consulta']['subsidio_superior'] = 0;
            $consulta['Consulta']['ipk'] = 0;
            $consulta['Consulta']['subsidio_pax'] = 0;
            $consulta['Consulta']['unidade_id'] = 8; // Pesos ($)
            $consulta['Consulta']['localidade_id'] = $this->Authake->getLocalidadId();
//            $consulta['Consulta']['observaciones'] = $this->request->data['Consulta']['observaciones'];
            $consulta['Consulta']['modo_id'] = 2; // Nueva Consulta.
            $consulta['Consulta']['estado_id'] = 1; // Activo
            $consulta['Consulta']['user_created'] = $this->Authake->getUserId();
            $consulta['Consulta']['user_modified'] = $this->Authake->getUserId();

            if (!$this->Consulta->save($consulta)) {
                $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
                return $this->redirect(array('action' => 'index'));
            }

            $consulta['Consulta']['id'] = $this->Consulta->id;

            $this->loadModel('Agrupamiento');
            $this->Agrupamiento->recursive = -1;
            $this->loadModel('Paso');
            $this->Paso->recursive = -1;
            $agrupamientos = $this->Agrupamiento->find('all', array(
                'conditions' => array('Agrupamiento.orden <>' => '0', 'Agrupamiento.estado_id <>' => '2'),
                'recursive' => -1,
                'order' => array('Agrupamiento.orden' => 'asc')
            ));

            foreach ($agrupamientos as $agrupamiento) {
                $paso = NULL;
                $this->Paso->create();
                $paso['Paso']['consulta_id'] = $consulta['Consulta']['id'];
                $paso['Paso']['agrupamiento_id'] = $agrupamiento['Agrupamiento']['id'];
                $paso['Paso']['completo'] = 0; // Incompleto
                $paso['Paso']['estado_id'] = 1; // Activo
                $paso['Paso']['user_created'] = $this->Authake->getUserId();
                $paso['Paso']['user_modified'] = $this->Authake->getUserId();
                $this->Paso->save($paso);
            }

            $this->loadModel('Coeficiente');
            $this->Coeficiente->recursive = 0;
            $this->loadModel('RespuestaCoeficiente');
            $this->RespuestaCoeficiente->recursive = -1;
            $this->loadModel('Matrix');
            $this->Matrix->recursive = -1;
            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;

            /*
            PREGUNTAS QUE NO INTERVIENEN EN COEFICIENTES
            */
            $preguntas = $this->Pregunta->find('all', array(
                'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '2', 'Pregunta.multiplicadore_id' => '1'),
                'recursive' => 0,
                'order' => array('Pregunta.orden' => 'asc')
            ));

            foreach ($preguntas as $pregunta) {

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
                            } else if ($pregunta['Pregunta']['id'] == '6') {
                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                            } else if ($pregunta['Pregunta']['id'] == '7') {

                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']] / $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']];

                                if ($coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] >= 0.8 && $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] <= 1) {
                                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 0;
                                } else if ($coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] > 0.3 && $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] < 0.8) {
                                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 0.5;
                                } else if ($coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] >= 0 && $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] <= 0.3) {
                                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 1;
                                } else {
                                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 0;
                                }
                            } else {
                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
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

//            $this->loadModel('Agrupamiento');
//            $this->Agrupamiento->recursive = -1;
//            $this->loadModel('Paso');
//            $this->Paso->recursive = -1;
            $agrupamiento = $this->Agrupamiento->find('first', array(
                'conditions' => array('Agrupamiento.orden' => '1', 'Agrupamiento.estado_id <>' => '2'),
                'recursive' => -1
            ));
            $paso = $this->Paso->find('first', array(
                'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                'recursive' => -1
            ));

            $this->Paso->id = $paso['Paso']['id'];
            $this->Paso->saveField('completo', 1);
            $this->Paso->saveField('user_modified', $this->Authake->getUserId());

/*            $paso['Paso']['completo'] = 1;
            $paso['Paso']['user_modified'] = $this->Authake->getUserId();
            if (!$this->Paso->save($paso)) {
                $this->Session->setFlash(__('The Paso could not be saved. Please, try again.'));
            } else {
                $this->Session->setFlash(__('The Paso has been saved.'));
            }*/

            $consulta['Consulta']['user_created'] = $this->Authake->getUserId();
            $consulta['Consulta']['modo_id'] = 3; // Incompleta: Pantalla "Uno" es la última pantalla completa.
            if (!$this->Consulta->save($consulta)) {
                $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
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
    public
    function editaruno($id = null)
    {

        if ($this->request->is('post')) {

            $this->loadModel('Pregunta');
            $this->Pregunta->recursive = -1;
            $this->loadModel('Opcione');
            $this->Opcione->recursive = -1;

            $consulta = $this->Consulta->find('first', array(
                'conditions' => array('Consulta.id' => $this->request->data['Consulta']['consulta_id']),
                'recursive' => -1,
            ));

            $this->loadModel('Coeficiente');
            $this->Coeficiente->recursive = 0;
            $this->loadModel('RespuestaCoeficiente');
            $this->RespuestaCoeficiente->recursive = -1;
            $this->loadModel('Matrix');
            $this->Matrix->recursive = -1;
            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;


            $sube_original = $this->RespuestaPregunta->find('first', array(
                'conditions' => array('RespuestaPregunta.consulta_id' => $consulta['Consulta']['id'], 'RespuestaPregunta.pregunta_id' => '23'),
                'recursive' => -1
            ));

            /*
            PREGUNTAS QUE NO INTERVIENEN EN COEFICIENTES
            */
            $preguntas = $this->Pregunta->find('all', array(
                'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '2', 'Pregunta.multiplicadore_id' => '1'),
                'recursive' => 0,
                'order' => array('Pregunta.orden' => 'asc')
            ));

            foreach ($preguntas as $pregunta) {

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
                    $respuestaPregunta['RespuestaPregunta']['user_modified'] = $this->Authake->getUserId();

                    if (!$this->RespuestaPregunta->save($respuestaPregunta)) {
                        $this->Session->setFlash(__('The RespuestaPregunta could not be saved. Please, try again.'));
                    } else {
                        $this->Session->setFlash(__('The RespuestaPregunta has been saved.'));
                    }
                    $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];
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
                        'recursive' => 0,
                        'order' => array('Pregunta.id' => 'asc')
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
                            } else if ($pregunta['Pregunta']['id'] == '6') {
                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
                            } else if ($pregunta['Pregunta']['id'] == '7') {

                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']] / $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']];

                                if ($coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] >= 0.8 && $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] <= 1) {
                                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 0;
                                } else if ($coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] > 0.3 && $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] < 0.8) {
                                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 0.5;
                                } else if ($coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] >= 0 && $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] <= 0.3) {
                                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 1;
                                } else {
                                    $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = 0;
                                }
                            } else {
                                $coeficiente['Coeficiente']['parcial_multiplicador'][$matrix['Matrix']['multiplicadore_id']] = $this->request->data['Consulta'][$pregunta['Pregunta']['id']];
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

            $sube_nuevo = $this->RespuestaPregunta->find('first', array(
                'conditions' => array('RespuestaPregunta.consulta_id' => $consulta['Consulta']['id'], 'RespuestaPregunta.pregunta_id' => '23'),
                'recursive' => -1
            ));

            if($sube_original['RespuestaPregunta']['opcione_id'] != $sube_nuevo['RespuestaPregunta']['opcione_id']){

                $this->loadModel('RespuestaPasajero');
                $this->RespuestaPasajero->recursive = -1;

                $tiene['10'] = '10';
                $tiene['11'] = '11';
                $tiene['12'] = '12';
                $tiene['13'] = '13';
                $tiene['14'] = '14';
                $tiene['15'] = '15';
                $tiene['16'] = '16';
                $tiene['17'] = '17';
                $tiene['18'] = '18';
                $tiene['19'] = '19';
                $tiene['20'] = '20';
                $tiene['21'] = '21';
                $tiene['27'] = '27';
                $tiene['28'] = '28';

                $this->RespuestaPregunta->deleteAll(array('RespuestaPregunta.consulta_id' => $consulta['Consulta']['id'], 'RespuestaPregunta.pregunta_id' => $tiene), false);

                $agrupamiento2 = $this->Agrupamiento->find('first', array(
                    'conditions' => array('Agrupamiento.orden' => '1', 'Agrupamiento.estado_id <>' => '2'),
                    'recursive' => -1
                ));
                $paso2 = $this->Paso->find('first', array(
                    'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento2['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                    'recursive' => -1
                ));

                $this->Paso->id = $paso2['Paso']['id'];
                $this->Paso->saveField('completo', 0);
                $this->Paso->saveField('user_modified', $this->Authake->getUserId());

                $this->RespuestaPasajero->deleteAll(array('RespuestaPasajero.consulta_id' => $consulta['Consulta']['id']), false);

                $agrupamiento3 = $this->Agrupamiento->find('first', array(
                    'conditions' => array('Agrupamiento.orden' => '3', 'Agrupamiento.estado_id <>' => '2'),
                    'recursive' => -1
                ));
                $paso3 = $this->Paso->find('first', array(
                    'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento3['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                    'recursive' => -1
                ));

                $this->Paso->id = $paso3['Paso']['id'];
                $this->Paso->saveField('completo', 0);
                $this->Paso->saveField('user_modified', $this->Authake->getUserId());

            }

            if ($consulta['Consulta']['modo_id'] == '3') {
                $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 1". Por favor, continuar con el "Paso 2".'));
                return $this->redirect(array('action' => 'dos', $consulta['Consulta']['id']));
            } else {
                $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 1". Por favor, continuar con el "Paso 2".'));
                return $this->redirect(array('action' => 'editardos', $consulta['Consulta']['id']));
            }
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

        if ($consulta['Consulta']['modo_id'] < 3) {
            return $this->redirect(array('action' => 'continuar', $consulta['Consulta']['id']));
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
                $this->request->data['Consulta'][$pregunta['Pregunta']['id']] = $respuestaPregunta['RespuestaPregunta']['valor'];
            }

        }
        $this->request->data['Consulta']['consulta_id'] = $id;
        $this->set(compact('preguntas'));

    }

    public
    function dos($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        if ($consulta['Consulta']['modo_id'] != '3') {
            return $this->redirect(array('action' => 'continuar', $consulta['Consulta']['id']));
        }

        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;

        if ($this->request->is('post')) {

            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;

            $consulta['Consulta']['id'] = $this->request->data['Consulta']['consulta_id'];

            $sube = $this->RespuestaPregunta->find('first', array(
                'conditions' => array('RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.pregunta_id' => '23'),
                'recursive' => -1
            ));
            //opcione_id = 24 --> SI; opcione_id = 25 --> NO
            if ($sube['RespuestaPregunta']['opcione_id'] == '25') {
                $tiene['10'] = '10';
                $tiene['11'] = '11';
                $tiene['12'] = '12';
                $tiene['13'] = '13';
                $tiene['14'] = '14';
                $tiene['15'] = '15';
                $tiene['16'] = '16';
                $tiene['17'] = '17';
                $tiene['18'] = '18';
                $tiene['19'] = '19';
                $tiene['20'] = '20';
                $tiene['21'] = '21';
            } else {
                $tiene['27'] = '27';
                $tiene['28'] = '28';
            }

            /*
            PREGUNTAS
            */
            $preguntas = $this->Pregunta->find('all', array(
                'conditions' => array('Pregunta.id <>' => $tiene, 'Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '3'),
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

            $this->loadModel('Agrupamiento');
            $this->Agrupamiento->recursive = -1;
            $this->loadModel('Paso');
            $this->Paso->recursive = -1;
            $agrupamiento = $this->Agrupamiento->find('first', array(
                'conditions' => array('Agrupamiento.orden' => '2', 'Agrupamiento.estado_id <>' => '2'),
                'recursive' => -1
            ));
            $paso = $this->Paso->find('first', array(
                'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                'recursive' => -1
            ));

            $this->Paso->id = $paso['Paso']['id'];
            $this->Paso->saveField('completo', 1);
            $this->Paso->saveField('user_modified', $this->Authake->getUserId());

/*            $paso['Paso']['completo'] = 1;
            $paso['Paso']['user_modified'] = $this->Authake->getUserId();
            if (!$this->Paso->save($paso)) {
                $this->Session->setFlash(__('The Paso could not be saved. Please, try again.'));
            } else {
                $this->Session->setFlash(__('The Paso has been saved.'));
            }*/

            $consulta['Consulta']['user_created'] = $this->Authake->getUserId();
            $consulta['Consulta']['modo_id'] = 4; // Incompleta: Pantalla "Dos" es la última pantalla completa.
            if (!$this->Consulta->save($consulta)) {
                $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
            }

            $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 2". Por favor, continuar con el "Paso 3".'));
            return $this->redirect(array('action' => 'tres', $consulta['Consulta']['id']));
        }

        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;
        $sube = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.pregunta_id' => '23'),
            'recursive' => -1
        ));
        //opcione_id = 24 --> SI; opcione_id = 25 --> NO
        if ($sube['RespuestaPregunta']['opcione_id'] == '25') {
            $tiene['10'] = '10';
            $tiene['11'] = '11';
            $tiene['12'] = '12';
            $tiene['13'] = '13';
            $tiene['14'] = '14';
            $tiene['15'] = '15';
            $tiene['16'] = '16';
            $tiene['17'] = '17';
            $tiene['18'] = '18';
            $tiene['19'] = '19';
            $tiene['20'] = '20';
            $tiene['21'] = '21';
        } else {
            $tiene['27'] = '27';
            $tiene['28'] = '28';
        }

        /*
        PREGUNTAS
        */
        $preguntas = $this->Pregunta->find('all', array(
            'conditions' => array('Pregunta.id <>' => $tiene, 'Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '3'),
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

    public
    function editardos($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        if ($consulta['Consulta']['modo_id'] < 4) {
            return $this->redirect(array('action' => 'continuar', $consulta['Consulta']['id']));
        }

        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;

        if ($this->request->is('post')) {

            $consulta = $this->Consulta->find('first', array(
                'conditions' => array('Consulta.id' => $this->request->data['Consulta']['consulta_id']),
                'recursive' => -1,
            ));

            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;
            $sube = $this->RespuestaPregunta->find('first', array(
                'conditions' => array('RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.pregunta_id' => '23'),
                'recursive' => -1
            ));
            //opcione_id = 24 --> SI; opcione_id = 25 --> NO
            if ($sube['RespuestaPregunta']['opcione_id'] == '25') {
                $tiene['10'] = '10';
                $tiene['11'] = '11';
                $tiene['12'] = '12';
                $tiene['13'] = '13';
                $tiene['14'] = '14';
                $tiene['15'] = '15';
                $tiene['16'] = '16';
                $tiene['17'] = '17';
                $tiene['18'] = '18';
                $tiene['19'] = '19';
                $tiene['20'] = '20';
                $tiene['21'] = '21';
            } else {
                $tiene['27'] = '27';
                $tiene['28'] = '28';
            }

            /*
            PREGUNTAS
            */
            $preguntas = $this->Pregunta->find('all', array(
                'conditions' => array('Pregunta.id <>' => $tiene, 'Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '3'),
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

                        if($respuestaPregunta == NULL){
                            $this->RespuestaPregunta->create();
                            $respuestaPregunta['RespuestaPregunta']['consulta_id'] = $consulta['Consulta']['id'];
                            $respuestaPregunta['RespuestaPregunta']['pregunta_id'] = $pregunta['Pregunta']['id'];
                        }

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

                    if($respuestaPregunta == NULL){
                        $this->RespuestaPregunta->create();
                        $respuestaPregunta['RespuestaPregunta']['consulta_id'] = $consulta['Consulta']['id'];
                        $respuestaPregunta['RespuestaPregunta']['pregunta_id'] = $pregunta['Pregunta']['id'];
                    }

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

            $this->loadModel('Agrupamiento');
            $this->Agrupamiento->recursive = -1;
            $this->loadModel('Paso');
            $this->Paso->recursive = -1;
            $agrupamiento = $this->Agrupamiento->find('first', array(
                'conditions' => array('Agrupamiento.orden' => '2', 'Agrupamiento.estado_id <>' => '2'),
                'recursive' => -1
            ));
            $paso = $this->Paso->find('first', array(
                'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                'recursive' => -1
            ));

            $this->Paso->id = $paso['Paso']['id'];
            $this->Paso->saveField('completo', 1);
            $this->Paso->saveField('user_modified', $this->Authake->getUserId());

            $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 2". Por favor, continuar con el "Paso 3".'));
            return $this->redirect(array('action' => 'tres', $consulta['Consulta']['id']));
        }

        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;
        $sube = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.pregunta_id' => '23'),
            'recursive' => -1
        ));
        //opcione_id = 24 --> SI; opcione_id = 25 --> NO
        if ($sube['RespuestaPregunta']['opcione_id'] == '25') {
            $tiene['10'] = '10';
            $tiene['11'] = '11';
            $tiene['12'] = '12';
            $tiene['13'] = '13';
            $tiene['14'] = '14';
            $tiene['15'] = '15';
            $tiene['16'] = '16';
            $tiene['17'] = '17';
            $tiene['18'] = '18';
            $tiene['19'] = '19';
            $tiene['20'] = '20';
            $tiene['21'] = '21';
        } else {
            $tiene['27'] = '27';
            $tiene['28'] = '28';
        }

        /*
        PREGUNTAS
        */
        $preguntas = $this->Pregunta->find('all', array(
            'conditions' => array('Pregunta.id <>' => $tiene, 'Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '3'),
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
                $this->request->data['Consulta'][$pregunta['Pregunta']['id']] = $respuestaPregunta['RespuestaPregunta']['valor'];
            }

        }
        $this->request->data['Consulta']['consulta_id'] = $id;
        $this->set(compact('consulta', 'preguntas'));
    }

    public
    function tres($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        if ($consulta['Consulta']['modo_id'] < 4) {
            return $this->redirect(array('action' => 'continuar', $consulta['Consulta']['id']));
        }

        $this->loadModel('RespuestaPasajero');
        $this->RespuestaPasajero->recursive = -1;

        if ($this->request->is('post')) {

            if ($this->request->data['accion'] == '1') {

                /*************************************
                 * SIGUIENTE PASO
                 *************************************/
                $base = $this->RespuestaPasajero->find('first', array(
                    'conditions' => array('RespuestaPasajero.consulta_id' => $this->request->data['Consulta']['consulta_id'], 'RespuestaPasajero.sube' => $this->request->data['Consulta']['tiene'], 'RespuestaPasajero.base <>' => '0', 'RespuestaPasajero.estado_id <>' => '2'),
                    'recursive' => -1
                ));
                /***ACTUALIZO LA BASE***/
                if (!empty($base)) {
                    if ($base['RespuestaPasajero']['id'] != $this->request->data['base']) {
                        $pasajero = $this->RespuestaPasajero->find('first', array(
                            'conditions' => array('RespuestaPasajero.id' => $this->request->data['base']),
                            'recursive' => -1
                        ));
                        $pasajero['RespuestaPasajero']['base'] = '1';
                        if ($this->RespuestaPasajero->save($pasajero)) {
                            $base['RespuestaPasajero']['base'] = '0';
                            if (!$this->RespuestaPasajero->save($base)) {
                                $this->Session->setFlash(__('Problemas al actualizar la Base.'));
                            }
                        } else {
                            $this->Session->setFlash(__('Problemas al actualizar la Base.'));
                        }
                    }
                }
/*                elseif ($this->request->data['base'] != NULL) {
                    $pasajero = $this->RespuestaPasajero->find('first', array(
                        'conditions' => array('RespuestaPasajero.id' => $this->request->data['base']),
                        'recursive' => -1
                    ));
                    $pasajero['RespuestaPasajero']['base'] = '1';
                    if (!$this->RespuestaPasajero->save($pasajero)) {
                        $this->Session->setFlash(__('Problemas al actualizar la Base.'));
                        return $this->redirect(array('action' => 'tres', $this->request->data['Consulta']['consulta_id']));
                    }
                } */
                else {
                    $this->Session->setFlash(__('Por favor, primero seleccione una tarifa como base.'), 'default', array('type' => 'danger'));
                    return $this->redirect(array('action' => 'tres', $this->request->data['Consulta']['consulta_id']));
                }

                if ($consulta['Consulta']['modo_id'] == '4') {
                    $this->loadModel('Agrupamiento');
                    $this->Agrupamiento->recursive = -1;
                    $this->loadModel('Paso');
                    $this->Paso->recursive = -1;
                    $agrupamiento = $this->Agrupamiento->find('first', array(
                        'conditions' => array('Agrupamiento.orden' => '3', 'Agrupamiento.estado_id <>' => '2'),
                        'recursive' => -1
                    ));
                    $paso = $this->Paso->find('first', array(
                        'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                        'recursive' => -1
                    ));

                    $this->Paso->id = $paso['Paso']['id'];
                    $this->Paso->saveField('completo', 1);
                    $this->Paso->saveField('user_modified', $this->Authake->getUserId());

/*                    $paso['Paso']['completo'] = 1;
                    $paso['Paso']['user_modified'] = $this->Authake->getUserId();
                    if (!$this->Paso->save($paso)) {
                        $this->Session->setFlash(__('The Paso could not be saved. Please, try again.'));
                    } else {
                        $this->Session->setFlash(__('The Paso has been saved.'));
                    }*/

                    $consulta['Consulta']['user_created'] = $this->Authake->getUserId();
                    $consulta['Consulta']['modo_id'] = 5; // Incompleta: Pantalla "Tres" es la última pantalla completa.
                    if (!$this->Consulta->save($consulta)) {
                        $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
                    }

                    $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 3". Por favor, continuar con el "Paso 4".'));
                    return $this->redirect(array('action' => 'cuatro', $this->request->data['Consulta']['consulta_id']));
                }
                else{
                    $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 3". Por favor, continuar con el "Paso 4".'));
                    return $this->redirect(array('action' => 'editarcuatro', $this->request->data['Consulta']['consulta_id']));
                }

            } elseif ($this->request->data['accion'] == '2') {

                /******************************************
                 * AGREGAR TARIFA
                 ******************************************/
                $RespuestaPasajero['RespuestaPasajero']['consulta_id'] = $this->request->data['Consulta']['consulta_id'];
                $RespuestaPasajero['RespuestaPasajero']['sube'] = $this->request->data['Consulta']['sube'];
                $RespuestaPasajero['RespuestaPasajero']['tarifa'] = $this->request->data['Consulta']['tarifa'];

                $primero = $this->RespuestaPasajero->find('all', array(
                    'conditions' => array('RespuestaPasajero.consulta_id' => $this->request->data['Consulta']['consulta_id'], 'RespuestaPasajero.sube' => $this->request->data['Consulta']['sube'], 'RespuestaPasajero.estado_id <>' => '2'),
                    'recursive' => -1
                ));
                if (empty($primero)) {
                    $RespuestaPasajero['RespuestaPasajero']['base'] = '1';
                } else {
                    $RespuestaPasajero['RespuestaPasajero']['base'] = '0';

                    /***ACTUALIZO LA BASE***/
                    if ($this->request->data['base'] != NULL) {
                        $base = $this->RespuestaPasajero->find('first', array(
                            'conditions' => array('RespuestaPasajero.consulta_id' => $this->request->data['Consulta']['consulta_id'], 'RespuestaPasajero.sube' => $this->request->data['Consulta']['tiene'], 'RespuestaPasajero.base <>' => '0', 'RespuestaPasajero.estado_id <>' => '2'),
                            'recursive' => -1
                        ));
                        if (!empty($base)) {
                            if ($base['RespuestaPasajero']['id'] != $this->request->data['base']) {
                                $pasajero = $this->RespuestaPasajero->find('first', array(
                                    'conditions' => array('RespuestaPasajero.id' => $this->request->data['base']),
                                    'recursive' => -1
                                ));
                                $pasajero['RespuestaPasajero']['base'] = '1';
                                if ($this->RespuestaPasajero->save($pasajero)) {
                                    $base['RespuestaPasajero']['base'] = '0';
                                    if (!$this->RespuestaPasajero->save($pasajero)) {
                                        $this->Session->setFlash(__('Problemas al actualizar la Base.'));
                                    }
                                } else {
                                    $this->Session->setFlash(__('Problemas al actualizar la Base.'));
                                }
                            }
                        }
                    }
                    /*****/
                }

                $RespuestaPasajero['RespuestaPasajero']['costo'] = $this->request->data['Consulta']['costo'];
                $RespuestaPasajero['RespuestaPasajero']['estado_id'] = '1';
                $RespuestaPasajero['RespuestaPasajero']['user_created'] = $this->Authake->getUserId();
                $RespuestaPasajero['RespuestaPasajero']['user_modified'] = $this->Authake->getUserId();

                if ($this->request->data['Consulta']['sube'] == '1') { // SI tiene SUBE
                    $RespuestaPasajero['RespuestaPasajero']['mes01'] = $this->request->data['Consulta']['mes01'];
                    $RespuestaPasajero['RespuestaPasajero']['mes02'] = $this->request->data['Consulta']['mes02'];
                    $RespuestaPasajero['RespuestaPasajero']['mes03'] = $this->request->data['Consulta']['mes03'];
                    $RespuestaPasajero['RespuestaPasajero']['mes04'] = $this->request->data['Consulta']['mes04'];
                    $RespuestaPasajero['RespuestaPasajero']['mes05'] = $this->request->data['Consulta']['mes05'];
                    $RespuestaPasajero['RespuestaPasajero']['mes06'] = $this->request->data['Consulta']['mes06'];
                    $RespuestaPasajero['RespuestaPasajero']['mes07'] = $this->request->data['Consulta']['mes07'];
                    $RespuestaPasajero['RespuestaPasajero']['mes08'] = $this->request->data['Consulta']['mes08'];
                    $RespuestaPasajero['RespuestaPasajero']['mes09'] = $this->request->data['Consulta']['mes09'];
                    $RespuestaPasajero['RespuestaPasajero']['mes10'] = $this->request->data['Consulta']['mes10'];
                    $RespuestaPasajero['RespuestaPasajero']['mes11'] = $this->request->data['Consulta']['mes11'];
                    $RespuestaPasajero['RespuestaPasajero']['mes12'] = $this->request->data['Consulta']['mes12'];
                } elseif ($this->request->data['Consulta']['sube'] == '0') { // NO tiene SUBE
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
        if ($sube['RespuestaPregunta']['opcione_id'] == '24') {
            $tiene = '1';
            $this->request->data['Consulta']['sube'] = '1';
        } else {
            $tiene = '0';
            $this->request->data['Consulta']['sube'] = '0';
        }
        $this->request->data['Consulta']['tiene'] = $tiene;

        $pasajeros = $this->RespuestaPasajero->find('all', array(
            'conditions' => array('RespuestaPasajero.consulta_id' => $id, 'RespuestaPasajero.sube' => $tiene, 'RespuestaPasajero.estado_id <>' => '2'),
            'order' => array('RespuestaPasajero.tarifa' => 'asc'),
            'recursive' => -1
        ));

        if (!empty($pasajeros)) {
            foreach ($pasajeros as $pasajero) {
                if ($pasajero['RespuestaPasajero']['base'] != '0') {
                    $this->request->data['base'] = $pasajero['RespuestaPasajero']['id'];
                }
            }
        }

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

        if ($consulta['Consulta']['modo_id'] != '5') {
            return $this->redirect(array('action' => 'continuar', $consulta['Consulta']['id']));
        }

        if ($this->request->is('post')) {

            /*
             * Respustas Preguntas
             * */
            $this->loadModel('Pregunta');
            $this->Pregunta->recursive = 0;
            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;

            $consulta = $this->Consulta->find('first', array(
                'conditions' => array('Consulta.id' => $this->request->data['Consulta']['consulta_id']),
                'recursive' => -1,
            ));

            $preguntas = $this->Pregunta->find('all', array(
                'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '5'),
                'recursive' => 0,
                'order' => array('Pregunta.orden' => 'asc')
            ));

            foreach ($preguntas as $preg => $pregunta) {

                if ($pregunta['Pregunta']['opciones'] == '1') {
                    $respuesta_opcion = $this->Opcione->find('first', array(
                        'conditions' => array('Opcione.id' => $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']]),
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
                    $respuestaPregunta['RespuestaPregunta']['valor'] = $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                    $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
                    $respuestaPregunta['RespuestaPregunta']['unidade_id'] = $pregunta['Pregunta']['unidade_id'];
                    $respuestaPregunta['RespuestaPregunta']['unidad'] = $pregunta['Unidade']['nombre'];
                    $respuestaPregunta['RespuestaPregunta']['respuesta'] = $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['funcion'] = $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']];
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

            /*
             * Salario
             */
            $this->loadModel('RespuestaSalario');
            $this->RespuestaSalario->recursive = -1;
            foreach ($this->request->data['Consulta']['categorias'] as $cat => $categoria) {
                $this->RespuestaSalario->create();
                $respuestaSalario['RespuestaSalario']['consulta_id'] = $consulta['Consulta']['id'];
                $respuestaSalario['RespuestaSalario']['categoria_id'] = $categoria['categoria_id'];
                $respuestaSalario['RespuestaSalario']['categoria'] = $categoria['categoria'];
                $respuestaSalario['RespuestaSalario']['cantidad'] = $categoria['cantidad'];
                $respuestaSalario['RespuestaSalario']['antiguedad'] = $categoria['antiguedad'];
                $respuestaSalario['RespuestaSalario']['salario'] = $categoria['salario'];
                $respuestaSalario['RespuestaSalario']['estado_id'] = 1;
                $respuestaSalario['RespuestaSalario']['user_created'] = $this->Authake->getUserId();
                $respuestaSalario['RespuestaSalario']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaSalario->save($respuestaSalario)) {
                    $this->Session->setFlash(__('The RespuestaSalario could not be saved. Please, try again.'));
                } else {
                    $this->Session->setFlash(__('The RespuestaSalario has been saved.'));
                }

            }

            /*
             * Estado consulta
             */
            $this->loadModel('Agrupamiento');
            $this->Agrupamiento->recursive = -1;
            $this->loadModel('Paso');
            $this->Paso->recursive = -1;
            $agrupamiento = $this->Agrupamiento->find('first', array(
                'conditions' => array('Agrupamiento.orden' => '4', 'Agrupamiento.estado_id <>' => '2'),
                'recursive' => -1
            ));
            $paso = $this->Paso->find('first', array(
                'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                'recursive' => -1
            ));

            $this->Paso->id = $paso['Paso']['id'];
            $this->Paso->saveField('completo', 1);
            $this->Paso->saveField('user_modified', $this->Authake->getUserId());

/*            $paso['Paso']['completo'] = 1;
            $paso['Paso']['user_modified'] = $this->Authake->getUserId();
            if (!$this->Paso->save($paso)) {
                $this->Session->setFlash(__('The Paso could not be saved. Please, try again.'));
            } else {
                $this->Session->setFlash(__('The Paso has been saved.'));
            }*/

            $consulta['Consulta']['user_created'] = $this->Authake->getUserId();
            $consulta['Consulta']['modo_id'] = 6; // Incompleta: Pantalla "Cuatro" es la última pantalla completa.
            if (!$this->Consulta->save($consulta)) {
                $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
            }

            $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 4". Por favor, continuar con el "Paso 5".'));
            return $this->redirect(array('action' => 'cinco', $this->request->data['Consulta']['consulta_id']));

        }

        $this->request->data['Consulta']['consulta_id'] = $id;


        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;

        /*
        PREGUNTAS
        */
        $preguntas = $this->Pregunta->find('all', array(
            'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '5'),
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

        /*
        CATEGORIAS
        */
        $this->loadModel('Categoria');
        $this->Categoria->recursive = -1;
        $categorias = $this->Categoria->find('all', array(
            'conditions' => array('Categoria.estado_id <>' => '2'),
            'order' => array('Categoria.nombre' => 'asc'),
            'recursive' => -1
        ));

        $this->loadModel('Parametro');
        $this->Parametro->recursive = -1;
        $parametro = $this->Parametro->find('first', array(
            'conditions' => array('Parametro.id' => '38'),
            'recursive' => -1
        ));

        $this->set(compact('consulta', 'categorias', 'preguntas', 'parametro'));
    }

    public
    function editarcuatro($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        if ($consulta['Consulta']['modo_id'] < '6') {
            return $this->redirect(array('action' => 'continuar', $consulta['Consulta']['id']));
        }

        if ($this->request->is('post')) {

            /*
             * Respustas Preguntas
             * */
            $this->loadModel('Pregunta');
            $this->Pregunta->recursive = 0;
            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;

            $consulta = $this->Consulta->find('first', array(
                'conditions' => array('Consulta.id' => $this->request->data['Consulta']['consulta_id']),
                'recursive' => -1,
            ));

            $preguntas = $this->Pregunta->find('all', array(
                'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '5'),
                'recursive' => 0,
                'order' => array('Pregunta.orden' => 'asc')
            ));

            foreach ($preguntas as $preg => $pregunta) {

                if ($pregunta['Pregunta']['opciones'] == '1') {
                    $respuesta_opcion = $this->Opcione->find('first', array(
                        'conditions' => array('Opcione.id' => $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']]),
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
                    $respuestaPregunta['RespuestaPregunta']['valor'] = $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['minimo'] = $pregunta['Pregunta']['minimo'];
                    $respuestaPregunta['RespuestaPregunta']['maximo'] = $pregunta['Pregunta']['maximo'];
                    $respuestaPregunta['RespuestaPregunta']['unidade_id'] = $pregunta['Pregunta']['unidade_id'];
                    $respuestaPregunta['RespuestaPregunta']['unidad'] = $pregunta['Unidade']['nombre'];
                    $respuestaPregunta['RespuestaPregunta']['respuesta'] = $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['funcion'] = $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']];
                    $respuestaPregunta['RespuestaPregunta']['estado_id'] = 1;
                    $respuestaPregunta['RespuestaPregunta']['user_modified'] = $this->Authake->getUserId();

                    if (!$this->RespuestaPregunta->save($respuestaPregunta)) {
                        $this->Session->setFlash(__('The RespuestaPregunta could not be saved. Please, try again.'));
                    } else {
                        $this->Session->setFlash(__('The RespuestaPregunta has been saved.'));
                    }
                    $preguntasRegistradas[$pregunta['Pregunta']['id']] = $pregunta['Pregunta']['id'];

                }
            }

            /*
             * Salario
             */
            $this->loadModel('RespuestaSalario');
            $this->RespuestaSalario->recursive = -1;
            foreach ($this->request->data['Consulta']['categorias'] as $cat => $categoria) {

                $respuestaSalario = $this->RespuestaSalario->find('first', array(
                    'conditions' => array('RespuestaSalario.consulta_id' => $consulta['Consulta']['id'], 'RespuestaSalario.categoria_id' => $categoria['categoria_id']),
                    'recursive' => -1,
                ));

                $respuestaSalario['RespuestaSalario']['categoria'] = $categoria['categoria'];
                $respuestaSalario['RespuestaSalario']['cantidad'] = $categoria['cantidad'];
                $respuestaSalario['RespuestaSalario']['antiguedad'] = $categoria['antiguedad'];
                $respuestaSalario['RespuestaSalario']['salario'] = $categoria['salario'];
                $respuestaSalario['RespuestaSalario']['estado_id'] = 1;
                $respuestaSalario['RespuestaSalario']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaSalario->save($respuestaSalario)) {
                    $this->Session->setFlash(__('The RespuestaSalario could not be saved. Please, try again.'));
                } else {
                    $this->Session->setFlash(__('The RespuestaSalario has been saved.'));
                }

            }

            /*
             * Estado consulta
             */
            if ($consulta['Consulta']['modo_id'] == '5') {
                $this->loadModel('Agrupamiento');
                $this->Agrupamiento->recursive = -1;
                $this->loadModel('Paso');
                $this->Paso->recursive = -1;
                $agrupamiento = $this->Agrupamiento->find('first', array(
                    'conditions' => array('Agrupamiento.orden' => '4', 'Agrupamiento.estado_id <>' => '2'),
                    'recursive' => -1
                ));
                $paso = $this->Paso->find('first', array(
                    'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                    'recursive' => -1
                ));

                $this->Paso->id = $paso['Paso']['id'];
                $this->Paso->saveField('completo', 1);
                $this->Paso->saveField('user_modified', $this->Authake->getUserId());

/*                $paso['Paso']['completo'] = 1;
                $paso['Paso']['user_modified'] = $this->Authake->getUserId();
                if (!$this->Paso->save($paso)) {
                    $this->Session->setFlash(__('The Paso could not be saved. Please, try again.'));
                } else {
                    $this->Session->setFlash(__('The Paso has been saved.'));
                }*/

                $consulta['Consulta']['user_created'] = $this->Authake->getUserId();
                $consulta['Consulta']['modo_id'] = 6; // Incompleta: Pantalla "Cuatro" es la última pantalla completa.
                if (!$this->Consulta->save($consulta)) {
                    $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
                }

                $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 4". Por favor, continuar con el "Paso 5".'));
                return $this->redirect(array('action' => 'cinco', $this->request->data['Consulta']['consulta_id']));
            }
            else{
                $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 4". Por favor, continuar con el "Paso 5".'));
                return $this->redirect(array('action' => 'editarcinco', $this->request->data['Consulta']['consulta_id']));
            }
        }

        $this->request->data['Consulta']['consulta_id'] = $id;


        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;

        /*
        PREGUNTAS
        */
        $preguntas = $this->Pregunta->find('all', array(
            'conditions' => array('Pregunta.estado_id <>' => '2', 'Pregunta.agrupamiento_id' => '5'),
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
                $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']] = $respuestaPregunta['RespuestaPregunta']['opcione_id'];
            } else {
                $this->request->data['Consulta']['preguntas'][$pregunta['Pregunta']['id']] = $respuestaPregunta['RespuestaPregunta']['valor'];
            }

        }
        /*
        CATEGORIAS
        */
        $this->loadModel('Categoria');
        $this->Categoria->recursive = -1;
        $categorias = $this->Categoria->find('all', array(
            'conditions' => array('Categoria.estado_id <>' => '2'),
            'order' => array('Categoria.nombre' => 'asc'),
            'recursive' => -1
        ));
        $this->loadModel('RespuestaSalario');
        $this->RespuestaSalario->recursive = -1;
        foreach ($categorias as $categ => $categoria) {
            $respuestaSalario = $this->RespuestaSalario->find('first', array(
                'conditions' => array('RespuestaSalario.consulta_id' => $id, 'RespuestaSalario.categoria_id' => $categoria['Categoria']['id'], 'RespuestaSalario.estado_id <>' => '2'),
                'recursive' => -1
            ));
            $this->request->data['Consulta']['categorias'][$categoria['Categoria']['id']]['cantidad'] = $respuestaSalario['RespuestaSalario']['cantidad'];
            $this->request->data['Consulta']['categorias'][$categoria['Categoria']['id']]['antiguedad'] = $respuestaSalario['RespuestaSalario']['antiguedad'];
            $this->request->data['Consulta']['categorias'][$categoria['Categoria']['id']]['salario'] = $respuestaSalario['RespuestaSalario']['salario'];
        }

        $this->loadModel('Parametro');
        $this->Parametro->recursive = -1;
        $parametro = $this->Parametro->find('first', array(
            'conditions' => array('Parametro.id' => '38'),
            'recursive' => -1
        ));

        $this->set(compact('consulta', 'categorias', 'preguntas', 'parametro'));
    }

    public function seis($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        if ($consulta['Consulta']['modo_id'] != '7') {
            return $this->redirect(array('action' => 'continuar', $consulta['Consulta']['id']));
        }

        $this->loadModel('Pregunta');
        $this->Pregunta->recursive = -1;
        $this->loadModel('Opcione');
        $this->Opcione->recursive = -1;

        if ($this->request->is('post')) {

            $consulta['Consulta']['id'] = $this->request->data['Consulta']['consulta_id'];

            $this->loadModel('Paso');
            $this->Paso->recursive = -1;
            $pasos = $this->Paso->find('all', array(
                'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.estado_id <>' => '2'),
                'recursive' => 0,
                'order' => array('Paso.agrupamiento_id' => 'asc')
            ));

            $completo = true;
            foreach ($pasos as $key => $paso) {
                if($paso['Paso']['completo'] == '0'){
                    $completo = false;
                }
            }

            if ($completo) {
                $this->Session->setFlash(__('Por favor, complete primero todos los pasos.'));
                return $this->redirect(array('action' => 'seis', $consulta['Consulta']['id']));
            }

            $this->loadModel('Parametro');
            $this->Parametro->recursive = 0;
            $this->loadModel('RespuestaParametro');
            $this->RespuestaParametro->recursive = -1;

            /*
            PARAMETROS
            */
            /*
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
            */

            /**************************************************************************************************************************************************/
            /**************************************************************************************************************************************************/
            /*
                Crear los Tipos (ResputaTipo).
                Próxima mejora: Automatizar los cálculos para que sean de forma dinámica y no estática como se realiza actualmente.
            */
            /*********************************************************************************************************/
            $this->loadModel('Tipo');
            $this->Tipo->recursive = 0;
            $this->loadModel('RespuestaTipo');
            $this->RespuestaTipo->recursive = -1;
            $tipo_item['1'] = '1'; // Costos Variables de Estructura
            $tipo_item['2'] = '2'; // Costos Fijos de Estructura
            $tipo_item['5'] = '5'; // Impuestos
            $tipos = $this->Tipo->find('all', array(
                'conditions' => array('Tipo.id' => $tipo_item, 'Tipo.estado_id <>' => '2'),
                'recursive' => 0
            ));
            foreach ($tipos as $tip => $tipo) {
                $this->RespuestaTipo->create();
                $respuestaTipo['RespuestaTipo']['consulta_id'] = $consulta['Consulta']['id'];
                $respuestaTipo['RespuestaTipo']['tipo_id'] = $tipo['Tipo']['id'];
                $respuestaTipo['RespuestaTipo']['tipo'] = $tipo['Tipo']['nombre'];
                $respuestaTipo['RespuestaTipo']['valor'] = 0;
                $respuestaTipo['RespuestaTipo']['incidencia_valor'] = 0;
                $respuestaTipo['RespuestaTipo']['minimo'] = 0;
                $respuestaTipo['RespuestaTipo']['incidencia_minimo'] = 0;
                $respuestaTipo['RespuestaTipo']['maximo'] = 0;
                $respuestaTipo['RespuestaTipo']['incidencia_maximo'] = 0;
                $respuestaTipo['RespuestaTipo']['unidade_id'] = $tipo['Unidade']['id'];
                $respuestaTipo['RespuestaTipo']['unidad'] = $tipo['Unidade']['nombre'];
                $respuestaTipo['RespuestaTipo']['estado_id'] = 1;
                $respuestaTipo['RespuestaTipo']['user_created'] = $this->Authake->getUserId();
                $respuestaTipo['RespuestaTipo']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaTipo->save($respuestaTipo)) {
                    $this->Session->setFlash(__('The RespuestaTipo could not be saved. Please, try again.'));
                } else {
                    $this->Session->setFlash(__('The RespuestaTipo has been saved.'));
                }
            }

            /**************************************************************************************************************************************************/
            /**************************************************************************************************************************************************/
            /*
                Calcular Respuesta Multiplicadores, Ítems, Tipos y Consulta.
                Próxima mejora: Automatizar los cálculos para que sean de forma dinámica y no estática como se realiza actualmente.
            */
            /*********************************************************************************************************/

            //$this->item1y2($item_id = null, $consulta_id = null, $parametro_id = null, $coeficiente_id = null)
            /* 1) ITEM1: COMBUSTIBLE - DETERMINACIÓN DEL COSTO DE COMBUSTIBLE: */
            //Tipo: "Costos Variables de Estructura": 1
            //Parametro Intervalo (Radio): "INTERVALO COSTO": 39
            $respuestaItem['1']['RespuestaItem']['id'] = $this->item1y2('1', $consulta['Consulta']['id'], '1', '1', '39');

            /* 2) ITEM2: FILTROS Y LUBRICANTES - DETERMINACIÓN DEL COSTO DE FILTROS Y LUBRICANTES: */
            //Tipo: "Costos Variables de Estructura": 1
            //Parametro Intervalo (Radio): "INTERVALO COSTO": 39
            $respuestaItem['2']['RespuestaItem']['id'] = $this->item1y2('2', $consulta['Consulta']['id'], '30', '3', '39');

            //$this->item3($item_id = null, $consulta_id = null, $parametro1_id = null, $parametro2_id = null, $coeficiente_id = null)
            /* 3) ITEM3: NEUMÁTICOS - DETERMINACIÓN DEL COSTO DE LOS NEUMÁTICO */
            //Tipo: "Costos Variables de Estructura": 1
            //Parametro Intervalo (Radio): "INTERVALO COSTO": 39
            $respuestaItem['3']['RespuestaItem']['id'] = $this->item3('3', $consulta['Consulta']['id'], '3', '4', '5', '39');

            //$this->item4($item_id = null, $consulta_id = null, $parametro_id = null, $pregunta1_id = null, $pregunta2_id = null, $coeficiente_id = null)
            /* 4) ITEM4: REPARACIONES, REPUESTOS Y ACCESORIOS - DETERMINACIÓN DEL COSTO POR REPARACIONES, REPUESTOS Y ACCESORIOS: */
            //Tipo: "Costos Variables de Estructura": 1
            //Parametro Intervalo (Radio): "INTERVALO COSTO": 39
            //Parametro1: "PRECIO OMNIBUS COMPLETO 0KM SIN IVA Y NEUMÁTICOS": 7
            //Pregunta1: "Flota total de omnibus": 9
            //Pregunta2: "¿Posee SUBE?": 23
            //Coeficiente1: "Repuestos y Reparaciones": 4
            $respuestaItem['4']['RespuestaItem']['id'] = $this->item4('4', $consulta['Consulta']['id'], '7', '9', '23', '4', '39');

            /* 5) ITEM5: COSTO DEL CAPITAL INVERTIDO: */
            //Tipo: "Costos Fijos de Estructura": 2
            //Parametro1: "PRECIO OMNIBUS COMPLETO 0KM SIN IVA Y NEUMÁTICOS": 7
            //Pregunta1: "Antigüedad máxima": 22 --> Con esto se que tabla usar y obtener "COEFICIENTE DE DEPRECIACIÓN DE UN OMNIBUS" y "FACTOR DE REMUNERACIÓN DE UN OMNIBUS"
            //Pregunta2: "¿En qué franja etaria promedio se encuentra la flota (en años)?": 5 --> Con esto entro a la tabla
            //Parametro2: "TASA DE REMUNERACIÓN DEL CAPITAL (TNA)": 5 --> Con esto obtengo "FACTOR DE REMUNERACIÓN DE MÁQUINAS Y EQUIPOS" (0,04*(x/12)) y "FACTOR DE REMUNERACIÓN DE EDIFICIOS" (0,03*(x/12))
            //Pregunta3: "¿Posee SUBE?": 23 --> Para ver como cargaron los KMs
            //Pregunta4: "Flota total de omnibus": 9
            //Parametro Intervalo (Radio): "INTERVALO COSTO": 39
            //$this->item5($item_id = null, $consulta_id = null, $parametro1_id = null, $parametro2_id = null, $pregunta1_id = null, $pregunta2_id = null, $pregunta3_id = null, $pregunta4_id = null)
            $respuestaItem['5']['RespuestaItem']['id'] = $this->item5('5', $consulta['Consulta']['id'], '7', '5', '22', '5', '23', '9', '39');

            /* 6) ITEM6: PERSONAL: */
            //Tipo: "Costos Fijos de Estructura": 2
            //Pregunta1: "Bonificación Anual ($)": 24
            //Pregunta2: "Contribuciones Patronales (%)": 25
            //Pregunta3: "Viáticos ($/día)": 26
            //Pregunta4: "Flota total de omnibus": 9
            //Pregunta5: "¿Posee SUBE?": 23 --> Para ver como cargaron los KMs
            //Parametro1: "SAC": 35
            //Parametro1: "VACACIONES": 36
            //Parametro Intervalo (Radio): "INTERVALO COSTO": 39
            //$this->item6($item_id = null, $consulta_id = null, $parametro1_id = null, $parametro2_id = null, $pregunta1_id = null, $pregunta2_id = null, $pregunta3_id = null, $pregunta4_id = null, $pregunta5_id = null)
            $respuestaItem['6']['RespuestaItem']['id'] = $this->item6('6', $consulta['Consulta']['id'], '35', '36', '24', '25', '26', '9', '23', '39');

            /* 9) ITEM9: COSTO DEL CAPITAL SUBE: */
            //Tipo: "Costos Fijos de Estructura": 2
            //Parametro1: "ALICUOTA DE RETENCION SISTEMA S.U.B.E.": 32
            //Pregunta1: "¿Posee SUBE?": 23 --> Para ver como cargaron los KMs
            //Pregunta2: Subsidio Anual al Sistema
            //Parametro Intervalo (Radio): "INTERVALO COSTO": 39
            //$this->item9($item_id = null, $consulta_id = null, $parametro_id = null, $pregunta1_id = null, $pregunta2_id = null)
            $respuestaItem['9']['RespuestaItem']['id'] = $this->item9('9', $consulta['Consulta']['id'], '32', '23', '29', '39');

            /* 7) ITEM7: COSTO DEL CAPITAL GTOS GRALES Y SEGURO: */
            //Tipo: "Costos Fijos de Estructura": 2
            //Parametro1: "SEGURO OBLIGATORIO PARA UN OMNIBUS": 6
            //Parametro2: "PRECIO OMNIBUS COMPLETO 0KM SIN IVA Y NEUMÁTICOS": 7
            //Coeficiente1: "Gastos Generales": 6
            //Pregunta1: "Flota total de omnibus": 9
            //Pregunta2: "¿Posee SUBE?": 23 --> Para ver como cargaron los KMs
            //Parametro Intervalo (Radio): "INTERVALO COSTO": 39
            //$this->item7($item_id = null, $consulta_id = null, $parametro1_id = null, $parametro2_id = null, $pregunta1_id = null, $pregunta2_id = null, $coeficiente_id = null)
            $respuestaItem['7']['RespuestaItem']['id'] = $this->item7('7', $consulta['Consulta']['id'], '6', '7', '9', '23', '6', '39');

            /* 8) ITEM8: IMPUESTOS Y TASAS: */
            //Parametro1: "ALÍCUOTA DE IMPUESTOS MENSUALES": 33
            //Tipo1: "Costos Variables de Estructura": 1
            //Tipo2: "Costos Fijos de Estructura": 2
            //Parametro Intervalo (Radio): "INTERVALO COSTO": 39
            //$this->item8($item_id = null, $consulta_id = null, $parametro_id = null, $tipo1_id = null, $tipo2_id = null)
            $respuestaItem['8']['RespuestaItem']['id'] = $this->item8('8', $consulta['Consulta']['id'], '33', '1', '2', '39');

            /**************************************************************************************************************************************************/
            /**************************************************************************************************************************************************/

            /**************************************************************************************************************************************************/
            /**************************************************************************************************************************************************/
            /*
                Calcular Incidencias.
                Próxima mejora: Automatizar los cálculos para que sean de forma dinámica y no estática como se realiza actualmente.
            */
            /*********************************************************************************************************/

            $incidencias = $this->incidencias($consulta['Consulta']['id']);

            /**************************************************************************************************************************************************/
            /**************************************************************************************************************************************************/

            /**************************************************************************************************************************************************/
            /**************************************************************************************************************************************************/
            /*
                Calcular Indicadores.
                Próxima mejora: Automatizar los cálculos para que sean de forma dinámica y no estática como se realiza actualmente.
            */
            /*********************************************************************************************************/

            $indicadores = $this->indicadores($consulta['Consulta']['id']);

            /**************************************************************************************************************************************************/
            /**************************************************************************************************************************************************/

            $consulta = $this->Consulta->find('first', $options);
            $this->loadModel('Agrupamiento');
            $this->Agrupamiento->recursive = -1;
            $this->loadModel('Paso');
            $this->Paso->recursive = -1;
            $agrupamiento = $this->Agrupamiento->find('first', array(
                'conditions' => array('Agrupamiento.orden' => '6', 'Agrupamiento.estado_id <>' => '2'),
                'recursive' => -1
            ));
            $paso = $this->Paso->find('first', array(
                'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                'recursive' => -1
            ));

            $this->Paso->id = $paso['Paso']['id'];
            $this->Paso->saveField('completo', 1);
            $this->Paso->saveField('user_modified', $this->Authake->getUserId());

            /*$paso['Paso']['completo'] = 1;
            $paso['Paso']['user_modified'] = $this->Authake->getUserId();
            if (!$this->Paso->save($paso)) {
                $this->Session->setFlash(__('The Paso could not be saved. Please, try again.'));
            } else {
                $this->Session->setFlash(__('The Paso has been saved.'));
            }*/

            $consulta['Consulta']['observaciones'] = $this->request->data['Consulta']['observaciones'];
            if ($this->request->data['Consulta']['localidade_id'] != '') {
                $consulta['Consulta']['localidade_id'] = $this->request->data['Consulta']['localidade_id'];
            }
            $consulta['Consulta']['user_modified'] = $this->Authake->getUserId();
            $consulta['Consulta']['modo_id'] = 1; // Completa.
            if (!$this->Consulta->save($consulta)) {
                $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
            }

            $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 6".'));
            return $this->redirect(array('action' => 'resultado', $consulta['Consulta']['id']));

        }

        $this->loadModel('Provincia');
        $this->Provincia->recursive = -1;
        $provincias = $this->Provincia->find('list', array(
            'fields' => array('Provincia.id', 'Provincia.nombre'),
            'conditions' => array('Provincia.nombre <>' => '', 'Provincia.estado_id' => '1'),
            'order' => array('Provincia.nombre' => 'asc')
        ));

        $this->loadModel('Localidade');
        $this->Localidade->recursive = 0;
        $localidad = $this->Localidade->find('first', array(
            'conditions' => array('Localidade.id' => $consulta['Consulta']['localidade_id']),
            'recursive' => 0,
        ));

        $this->request->data['Consulta']['consulta_id'] = $id;


        $this->loadModel('Paso');
        $this->Paso->recursive = 0;
        $pasos = $this->Paso->find('all', array(
            'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.estado_id <>' => '2'),
            'recursive' => 0,
            'order' => array('Paso.agrupamiento_id' => 'asc')
        ));

        $completo = true;
        foreach ($pasos as $key => $paso) {
            if($paso['Paso']['completo'] == '0' && $paso['Paso']['agrupamiento_id'] != '7'){
                $completo = false;
            }
        }

        $this->set(compact('consulta', 'provincias', 'preguntas', 'localidad', 'pasos', 'completo'));
    }





    public function cinco($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        if ($consulta['Consulta']['modo_id'] != '6') {
            return $this->redirect(array('action' => 'continuar', $consulta['Consulta']['id']));
        }

        $this->loadModel('Parametro');
        $this->Parametro->recursive = 0;

        /*
        PARAMETROS
        */
        $parametros = $this->Parametro->find('all', array(
            'conditions' => array('Parametro.editable' => '1', 'Parametro.estado_id <>' => '2'),
            'recursive' => 0
        ));

        if ($this->request->is('post')) {

            $this->loadModel('RespuestaParametro');
            $this->RespuestaParametro->recursive = -1;

            $consulta['Consulta']['id'] = $this->request->data['Consulta']['consulta_id'];

            //debug($this->request->data);
            //exit;

            foreach ($parametros as $key => $parametro) {
                $this->RespuestaParametro->create();
                $respuestaParametro['RespuestaParametro']['consulta_id'] = $consulta['Consulta']['id'];
                $respuestaParametro['RespuestaParametro']['parametro_id'] = $parametro['Parametro']['id'];
                $respuestaParametro['RespuestaParametro']['parametro'] = $parametro['Parametro']['nombre'];
                $respuestaParametro['RespuestaParametro']['editable'] = $parametro['Parametro']['editable'];

                if(($parametro['Parametro']['editable'] == '1') && ($parametro['Parametro']['valor'] != $this->request->data['Consulta'][$parametro['Parametro']['id']])){
                    $respuestaParametro['RespuestaParametro']['valor'] = $this->request->data['Consulta'][$parametro['Parametro']['id']];
                    $respuestaParametro['RespuestaParametro']['editado'] = '1';
                }else{
                    $respuestaParametro['RespuestaParametro']['valor'] = $parametro['Parametro']['valor'];
                    $respuestaParametro['RespuestaParametro']['editado'] = '0';
                }

                $respuestaParametro['RespuestaParametro']['minimo'] = $parametro['Parametro']['minimo'];
                $respuestaParametro['RespuestaParametro']['maximo'] = $parametro['Parametro']['maximo'];
                $respuestaParametro['RespuestaParametro']['tipo'] = $parametro['Parametro']['tipo'];
                $respuestaParametro['RespuestaParametro']['step'] = $parametro['Parametro']['step'];

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
            * Estado consulta
            */
            $this->loadModel('Agrupamiento');
            $this->Agrupamiento->recursive = -1;
            $this->loadModel('Paso');
            $this->Paso->recursive = -1;
            $agrupamiento = $this->Agrupamiento->find('first', array(
                'conditions' => array('Agrupamiento.orden' => '5', 'Agrupamiento.estado_id <>' => '2'),
                'recursive' => -1
            ));
            $paso = $this->Paso->find('first', array(
                'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                'recursive' => -1
            ));

            $this->Paso->id = $paso['Paso']['id'];
            $this->Paso->saveField('completo', 1);
            $this->Paso->saveField('user_modified', $this->Authake->getUserId());

            /*$paso['Paso']['completo'] = 1;
            $paso['Paso']['user_modified'] = $this->Authake->getUserId();
            if (!$this->Paso->save($paso)) {
                $this->Session->setFlash(__('The Paso could not be saved. Please, try again.'));
            } else {
                $this->Session->setFlash(__('The Paso has been saved.'));
            }*/

            $consulta['Consulta']['user_created'] = $this->Authake->getUserId();
            $consulta['Consulta']['modo_id'] = 7; // Incompleta: Pantalla "Cinco" es la última pantalla completa.
            if (!$this->Consulta->save($consulta)) {
                $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
            }

            $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 5". Por favor, continuar con el "Paso 6".'));
            return $this->redirect(array('action' => 'seis', $this->request->data['Consulta']['consulta_id']));
        }
        $this->request->data['Consulta']['consulta_id'] = $id;
        $this->set(compact('consulta', 'parametros'));
    }


    public function editarcinco($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        if ($consulta['Consulta']['modo_id'] < '7') {
            return $this->redirect(array('action' => 'continuar', $consulta['Consulta']['id']));
        }

        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = -1;
        //$this->loadModel('Parametro');
        //$this->Parametro->recursive = 0;

        /*
        PARAMETROS
        */
        $parametros = $this->RespuestaParametro->find('all', array(
            'conditions' => array('RespuestaParametro.consulta_id' => $id, 'RespuestaParametro.editable' => '1', 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        if ($this->request->is('post')) {

            $consulta['Consulta']['id'] = $this->request->data['Consulta']['consulta_id'];

            foreach ($parametros as $key => $parametro) {
                if(($parametro['RespuestaParametro']['editable'] == '1') && ($parametro['RespuestaParametro']['valor'] != $this->request->data['Consulta'][$parametro['RespuestaParametro']['id']])){
                    $respuestaParametro['RespuestaParametro']['id'] = $parametro['RespuestaParametro']['id'];
                    $respuestaParametro['RespuestaParametro']['valor'] = $this->request->data['Consulta'][$parametro['RespuestaParametro']['id']];
                    $respuestaParametro['RespuestaParametro']['editado'] = '1';
                    $respuestaParametro['RespuestaParametro']['user_modified'] = $this->Authake->getUserId();
                    if (!$this->RespuestaParametro->save($respuestaParametro)) {
                        $this->Session->setFlash(__('The RespuestaParametro could not be saved. Please, try again.'));
                    } else {
                        $this->Session->setFlash(__('The RespuestaParametro has been saved.'));
                    }
                }
            }

            /*
            * Estado consulta
            */
            $this->loadModel('Agrupamiento');
            $this->Agrupamiento->recursive = -1;
            $this->loadModel('Paso');
            $this->Paso->recursive = -1;
            $agrupamiento = $this->Agrupamiento->find('first', array(
                'conditions' => array('Agrupamiento.orden' => '5', 'Agrupamiento.estado_id <>' => '2'),
                'recursive' => -1
            ));
            $paso = $this->Paso->find('first', array(
                'conditions' => array('Paso.consulta_id' => $consulta['Consulta']['id'], 'Paso.agrupamiento_id' => $agrupamiento['Agrupamiento']['id'], 'Paso.estado_id <>' => '2'),
                'recursive' => -1
            ));

            $this->Paso->id = $paso['Paso']['id'];
            $this->Paso->saveField('completo', 1);
            $this->Paso->saveField('user_modified', $this->Authake->getUserId());

            /*$paso['Paso']['completo'] = 1;
            $paso['Paso']['user_modified'] = $this->Authake->getUserId();
            if (!$this->Paso->save($paso)) {
                $this->Session->setFlash(__('The Paso could not be saved. Please, try again.'));
            } else {
                $this->Session->setFlash(__('The Paso has been saved.'));
            }*/

            $consulta['Consulta']['user_created'] = $this->Authake->getUserId();
            $consulta['Consulta']['modo_id'] = 7; // Incompleta: Pantalla "Cinco" es la última pantalla completa.
            if (!$this->Consulta->save($consulta)) {
                $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
            }

            $this->Session->setFlash(__('Se complet&oacute; correctamente el "Paso 5". Por favor, continuar con el "Paso 6".'));
            return $this->redirect(array('action' => 'seis', $this->request->data['Consulta']['consulta_id']));
        }
        $this->request->data['Consulta']['consulta_id'] = $id;
        $this->set(compact('consulta', 'parametros'));
    }

    public
    function continuar($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            $this->Session->setFlash(__('No existe consulta asociada.'));
            return $this->redirect(array('action' => 'index'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        if ($consulta['Modo']['id'] == '1') {
            return $this->redirect(array('action' => 'resultado', $consulta['Consulta']['id']));
        } elseif ($consulta['Modo']['id'] == '2') {
            $this->Session->setFlash(__('Por favor, continuar con el "Paso 1".'));
            return $this->redirect(array('action' => 'uno', $consulta['Consulta']['id']));
        } elseif ($consulta['Modo']['id'] == '3') {
            $this->Session->setFlash(__('Por favor, continuar con el "Paso 2".'));
            return $this->redirect(array('action' => 'dos', $consulta['Consulta']['id']));
        } elseif ($consulta['Modo']['id'] == '4') {
            $this->Session->setFlash(__('Por favor, continuar con el "Paso 3".'));
            return $this->redirect(array('action' => 'tres', $consulta['Consulta']['id']));
        } elseif ($consulta['Modo']['id'] == '5') {
            $this->Session->setFlash(__('Por favor, continuar con el "Paso 4".'));
            return $this->redirect(array('action' => 'cuatro', $consulta['Consulta']['id']));
        } elseif ($consulta['Modo']['id'] == '6') {
            $this->Session->setFlash(__('Por favor, continuar con el "Paso 5".'));
            return $this->redirect(array('action' => 'cinco', $consulta['Consulta']['id']));
        }  elseif ($consulta['Modo']['id'] == '7') {
            $this->Session->setFlash(__('Por favor, continuar con el "Paso 6".'));
            return $this->redirect(array('action' => 'seis', $consulta['Consulta']['id']));
        } else {
            return $this->redirect(array('action' => 'index'));
        }

        return $this->redirect(array('action' => 'index'));
    }

    public
    function eliminar($id = null)
    {
        $this->Consulta->id = $id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);
        $consulta['Consulta']['estado_id'] = '2'; // Inactiva
        if ($this->Consulta->save($consulta)) {

            $this->loadModel('RespuestaCoeficiente');
            $this->RespuestaCoeficiente->recursive = -1;
            $this->RespuestaCoeficiente->updateAll(
                array('RespuestaCoeficiente.estado_id' => '2'),
                array('RespuestaCoeficiente.consulta_id' => $consulta['Consulta']['id'])
            );

            $this->loadModel('RespuestaIndicadore');
            $this->RespuestaIndicadore->recursive = -1;
            $this->RespuestaIndicadore->updateAll(
                array('RespuestaIndicadore.estado_id' => '2'),
                array('RespuestaIndicadore.consulta_id' => $consulta['Consulta']['id'])
            );

            $this->loadModel('RespuestaItem');
            $this->RespuestaItem->recursive = -1;
            $this->RespuestaItem->updateAll(
                array('RespuestaItem.estado_id' => '2'),
                array('RespuestaItem.consulta_id' => $consulta['Consulta']['id'])
            );

            $this->loadModel('RespuestaMultiplicadore');
            $this->RespuestaMultiplicadore->recursive = -1;
            $this->RespuestaMultiplicadore->updateAll(
                array('RespuestaMultiplicadore.estado_id' => '2'),
                array('RespuestaMultiplicadore.consulta_id' => $consulta['Consulta']['id'])
            );

            $this->loadModel('RespuestaParametro');
            $this->RespuestaParametro->recursive = -1;
            $this->RespuestaParametro->updateAll(
                array('RespuestaParametro.estado_id' => '2'),
                array('RespuestaParametro.consulta_id' => $consulta['Consulta']['id'])
            );

            $this->loadModel('RespuestaPasajero');
            $this->RespuestaPasajero->recursive = -1;
            $this->RespuestaPasajero->updateAll(
                array('RespuestaPasajero.estado_id' => '2'),
                array('RespuestaPasajero.consulta_id' => $consulta['Consulta']['id'])
            );

            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;
            $this->RespuestaPregunta->updateAll(
                array('RespuestaPregunta.estado_id' => '2'),
                array('RespuestaPregunta.consulta_id' => $consulta['Consulta']['id'])
            );

            $this->loadModel('RespuestaSalario');
            $this->RespuestaSalario->recursive = -1;
            $this->RespuestaSalario->updateAll(
                array('RespuestaSalario.estado_id' => '2'),
                array('RespuestaSalario.consulta_id' => $consulta['Consulta']['id'])
            );

            $this->loadModel('RespuestaTipo');
            $this->RespuestaTipo->recursive = -1;
            $this->RespuestaTipo->updateAll(
                array('RespuestaTipo.estado_id' => '2'),
                array('RespuestaTipo.consulta_id' => $consulta['Consulta']['id'])
            );

            $this->Session->setFlash(__('The consulta has been saved.'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
        }

        return $this->redirect(array('action' => 'index'));
    }

    /* 1) ITEM1: COMBUSTIBLE - DETERMINACIÓN DEL COSTO DE COMBUSTIBLE */
    /* 2) ITEM2: FILTROS Y LUBRICANTES - DETERMINACIÓN DEL COSTO DE FILTROS Y LUBRICANTES */
    public function item1y2($item_id = null, $consulta_id = null, $parametro_id = null, $coeficiente_id = null, $intervalo_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = -1;
        $this->loadModel('RespuestaCoeficiente');
        $this->RespuestaCoeficiente->recursive = -1;

        $intervaloParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $intervalo_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestacoeficiente = $this->RespuestaCoeficiente->find('first', array(
            'conditions' => array('RespuestaCoeficiente.coeficiente_id' => $coeficiente_id, 'RespuestaCoeficiente.consulta_id' => $consulta_id, 'RespuestaCoeficiente.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = -1;
        $this->loadModel('Item');
        $this->Item->recursive = 0;

        $item = $this->Item->find('first', array(
            'conditions' => array('Item.id' => $item_id),
            'recursive' => 0
        ));
        $this->RespuestaItem->create();
        $respuestaItem['RespuestaItem']['consulta_id'] = $consulta_id;
        $respuestaItem['RespuestaItem']['item_id'] = $item['Item']['id'];
        $respuestaItem['RespuestaItem']['item'] = $item['Item']['nombre'];
        $respuestaItem['RespuestaItem']['valor'] = $respuestaParametro['RespuestaParametro']['valor'] * $respuestacoeficiente['RespuestaCoeficiente']['valor'];
        $respuestaItem['RespuestaItem']['incidencia_valor'] = 0;
        $respuestaItem['RespuestaItem']['minimo'] = $respuestaParametro['RespuestaParametro']['valor'] * $respuestacoeficiente['RespuestaCoeficiente']['minimo'];
        $respuestaItem['RespuestaItem']['incidencia_minimo'] = 0;
        $respuestaItem['RespuestaItem']['maximo'] = $respuestaParametro['RespuestaParametro']['valor'] * $respuestacoeficiente['RespuestaCoeficiente']['maximo'];
        $respuestaItem['RespuestaItem']['incidencia_maximo'] = 0;
        $respuestaItem['RespuestaItem']['unidade_id'] = $item['Unidade']['id'];
        $respuestaItem['RespuestaItem']['unidad'] = $item['Unidade']['nombre'];
        $respuestaItem['RespuestaItem']['estado_id'] = 1;
        $respuestaItem['RespuestaItem']['user_created'] = $this->Authake->getUserId();
        $respuestaItem['RespuestaItem']['user_modified'] = $this->Authake->getUserId();

        $respuestaItem['RespuestaItem']['inferior'] = $respuestaItem['RespuestaItem']['valor'] - ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['superior'] = $respuestaItem['RespuestaItem']['valor'] + ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['incidencia_inferior'] = 0;
        $respuestaItem['RespuestaItem']['incidencia_superior'] = 0;

        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = -1;
        $respuestaTipo = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $item['Item']['tipo_id'], 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $respuestaTipo['RespuestaTipo']['valor'] = $respuestaTipo['RespuestaTipo']['valor'] + $respuestaItem['RespuestaItem']['valor'];
        $respuestaTipo['RespuestaTipo']['inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] + $respuestaItem['RespuestaItem']['inferior'];
        $respuestaTipo['RespuestaTipo']['maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] + $respuestaItem['RespuestaItem']['maximo'];
        $respuestaTipo['RespuestaTipo']['minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] + $respuestaItem['RespuestaItem']['minimo'];
        $respuestaTipo['RespuestaTipo']['superior'] = $respuestaTipo['RespuestaTipo']['superior'] + $respuestaItem['RespuestaItem']['superior'];
        if (!$this->RespuestaTipo->save($respuestaTipo)) {
            return false;
        } else {
            return ($this->RespuestaItem->save($respuestaItem));
        }
    }

    /* 3) ITEM3: NEUMÁTICOS - DETERMINACIÓN DEL COSTO DE LOS NEUMÁTICO */
    public function item3($item_id = null, $consulta_id = null, $parametro1_id = null, $parametro2_id = null, $coeficiente_id = null, $intervalo_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = 0;
        $this->loadModel('RespuestaCoeficiente');
        $this->RespuestaCoeficiente->recursive = -1;

        $intervaloParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $intervalo_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro1 = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro1_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => 0
        ));

        $respuestaParametro2 = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro2_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro['RespuestaParametro']['valor'] = $respuestaParametro1['RespuestaParametro']['valor'] * $respuestaParametro2['RespuestaParametro']['valor'];
        $respuestaParametro['Unidade']['id'] = $respuestaParametro1['Unidade']['id'];
        $respuestaParametro['Unidade']['nombre'] = $respuestaParametro1['Unidade']['nombre'];

        $respuestacoeficiente = $this->RespuestaCoeficiente->find('first', array(
            'conditions' => array('RespuestaCoeficiente.coeficiente_id' => $coeficiente_id, 'RespuestaCoeficiente.consulta_id' => $consulta_id, 'RespuestaCoeficiente.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = -1;
        $this->loadModel('Item');
        $this->Item->recursive = 0;

        $item = $this->Item->find('first', array(
            'conditions' => array('Item.id' => $item_id),
            'recursive' => 0
        ));
        $this->RespuestaItem->create();
        $respuestaItem['RespuestaItem']['consulta_id'] = $consulta_id;
        $respuestaItem['RespuestaItem']['item_id'] = $item['Item']['id'];
        $respuestaItem['RespuestaItem']['item'] = $item['Item']['nombre'];
        $respuestaItem['RespuestaItem']['valor'] = $respuestaParametro['RespuestaParametro']['valor'] / $respuestacoeficiente['RespuestaCoeficiente']['valor'];
        $respuestaItem['RespuestaItem']['incidencia_valor'] = 0;
        $respuestaItem['RespuestaItem']['minimo'] = $respuestaParametro['RespuestaParametro']['valor'] / $respuestacoeficiente['RespuestaCoeficiente']['minimo'];
        $respuestaItem['RespuestaItem']['incidencia_minimo'] = 0;
        $respuestaItem['RespuestaItem']['maximo'] = $respuestaParametro['RespuestaParametro']['valor'] / $respuestacoeficiente['RespuestaCoeficiente']['maximo'];
        $respuestaItem['RespuestaItem']['incidencia_maximo'] = 0;
        $respuestaItem['RespuestaItem']['unidade_id'] = $item['Unidade']['id'];
        $respuestaItem['RespuestaItem']['unidad'] = $item['Unidade']['nombre'];
        $respuestaItem['RespuestaItem']['estado_id'] = 1;
        $respuestaItem['RespuestaItem']['user_created'] = $this->Authake->getUserId();
        $respuestaItem['RespuestaItem']['user_modified'] = $this->Authake->getUserId();

        $respuestaItem['RespuestaItem']['inferior'] = $respuestaItem['RespuestaItem']['valor'] - ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['superior'] = $respuestaItem['RespuestaItem']['valor'] + ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['incidencia_inferior'] = 0;
        $respuestaItem['RespuestaItem']['incidencia_superior'] = 0;

        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = -1;
        $respuestaTipo = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $item['Item']['tipo_id'], 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $respuestaTipo['RespuestaTipo']['valor'] = $respuestaTipo['RespuestaTipo']['valor'] + $respuestaItem['RespuestaItem']['valor'];
        $respuestaTipo['RespuestaTipo']['inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] + $respuestaItem['RespuestaItem']['inferior'];
        $respuestaTipo['RespuestaTipo']['maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] + $respuestaItem['RespuestaItem']['maximo'];
        $respuestaTipo['RespuestaTipo']['minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] + $respuestaItem['RespuestaItem']['minimo'];
        $respuestaTipo['RespuestaTipo']['superior'] = $respuestaTipo['RespuestaTipo']['superior'] + $respuestaItem['RespuestaItem']['superior'];
        if (!$this->RespuestaTipo->save($respuestaTipo)) {
            return false;
        } else {
            return ($this->RespuestaItem->save($respuestaItem));
        }
    }

    /* 4) ITEM4: REPARACIONES, REPUESTOS Y ACCESORIOS - DETERMINACIÓN DEL COSTO POR REPARACIONES, REPUESTOS Y ACCESORIOS */
    public function item4($item_id = null, $consulta_id = null, $parametro_id = null, $pregunta1_id = null, $pregunta2_id = null, $coeficiente_id = null, $intervalo_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = -1;
        $this->loadModel('RespuestaCoeficiente');
        $this->RespuestaCoeficiente->recursive = -1;
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;

        $intervaloParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $intervalo_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestacoeficiente = $this->RespuestaCoeficiente->find('first', array(
            'conditions' => array('RespuestaCoeficiente.coeficiente_id' => $coeficiente_id, 'RespuestaCoeficiente.consulta_id' => $consulta_id, 'RespuestaCoeficiente.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta1 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta1_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta2 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta2_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        //opcione_id = 24 --> SI; opcione_id = 25 --> NO
        $tiene = null;
        if ($respuestaPregunta2['RespuestaPregunta']['opcione_id'] == '24') {
            $tiene['10'] = '10';
            $tiene['11'] = '11';
            $tiene['12'] = '12';
            $tiene['13'] = '13';
            $tiene['14'] = '14';
            $tiene['15'] = '15';
            $tiene['16'] = '16';
            $tiene['17'] = '17';
            $tiene['18'] = '18';
            $tiene['19'] = '19';
            $tiene['20'] = '20';
            $tiene['21'] = '21';
        } else {
            $tiene['27'] = '27';
            $tiene['28'] = '28';
        }
        $kms = $this->RespuestaPregunta->find('all', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $tiene, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $recorridos = 0;
        foreach ($kms as $key => $km) {
            $recorridos = $recorridos + $km['RespuestaPregunta']['valor'];
        }
        $recorridos = $recorridos / 12 / $respuestaPregunta1['RespuestaPregunta']['valor'];

        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = -1;
        $this->loadModel('Item');
        $this->Item->recursive = 0;

        $item = $this->Item->find('first', array(
            'conditions' => array('Item.id' => $item_id),
            'recursive' => 0
        ));
        $this->RespuestaItem->create();
        $respuestaItem['RespuestaItem']['consulta_id'] = $consulta_id;
        $respuestaItem['RespuestaItem']['item_id'] = $item['Item']['id'];
        $respuestaItem['RespuestaItem']['item'] = $item['Item']['nombre'];
        $respuestaItem['RespuestaItem']['valor'] = $respuestaParametro['RespuestaParametro']['valor'] * $respuestacoeficiente['RespuestaCoeficiente']['valor'] / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_valor'] = 0;
        $respuestaItem['RespuestaItem']['minimo'] = $respuestaParametro['RespuestaParametro']['valor'] * $respuestacoeficiente['RespuestaCoeficiente']['minimo'] / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_minimo'] = 0;
        $respuestaItem['RespuestaItem']['maximo'] = $respuestaParametro['RespuestaParametro']['valor'] * $respuestacoeficiente['RespuestaCoeficiente']['maximo'] / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_maximo'] = 0;
        $respuestaItem['RespuestaItem']['unidade_id'] = $item['Unidade']['id'];
        $respuestaItem['RespuestaItem']['unidad'] = $item['Unidade']['nombre'];
        $respuestaItem['RespuestaItem']['estado_id'] = 1;
        $respuestaItem['RespuestaItem']['user_created'] = $this->Authake->getUserId();
        $respuestaItem['RespuestaItem']['user_modified'] = $this->Authake->getUserId();

        $respuestaItem['RespuestaItem']['inferior'] = $respuestaItem['RespuestaItem']['valor'] - ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['superior'] = $respuestaItem['RespuestaItem']['valor'] + ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['incidencia_inferior'] = 0;
        $respuestaItem['RespuestaItem']['incidencia_superior'] = 0;

        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = -1;
        $respuestaTipo = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $item['Item']['tipo_id'], 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $respuestaTipo['RespuestaTipo']['valor'] = $respuestaTipo['RespuestaTipo']['valor'] + $respuestaItem['RespuestaItem']['valor'];
        $respuestaTipo['RespuestaTipo']['inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] + $respuestaItem['RespuestaItem']['inferior'];
        $respuestaTipo['RespuestaTipo']['maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] + $respuestaItem['RespuestaItem']['maximo'];
        $respuestaTipo['RespuestaTipo']['minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] + $respuestaItem['RespuestaItem']['minimo'];
        $respuestaTipo['RespuestaTipo']['superior'] = $respuestaTipo['RespuestaTipo']['superior'] + $respuestaItem['RespuestaItem']['superior'];
        if (!$this->RespuestaTipo->save($respuestaTipo)) {
            return false;
        } else {
            return ($this->RespuestaItem->save($respuestaItem));
        }
    }

    /* 5) ITEM5: COSTO DEL CAPITAL INVERTIDO */
    public function item5($item_id = null, $consulta_id = null, $parametro1_id = null, $parametro2_id = null, $pregunta1_id = null, $pregunta2_id = null, $pregunta3_id = null, $pregunta4_id = null, $intervalo_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = -1;
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;

        $intervaloParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $intervalo_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro1 = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro1_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro2 = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro2_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta1 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta1_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta2 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta2_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta3 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta3_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta4 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta4_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        //opcione_id = 24 --> SI; opcione_id = 25 --> NO
        $tiene = null;
        if ($respuestaPregunta3['RespuestaPregunta']['opcione_id'] == '24') {
            $tiene['10'] = '10';
            $tiene['11'] = '11';
            $tiene['12'] = '12';
            $tiene['13'] = '13';
            $tiene['14'] = '14';
            $tiene['15'] = '15';
            $tiene['16'] = '16';
            $tiene['17'] = '17';
            $tiene['18'] = '18';
            $tiene['19'] = '19';
            $tiene['20'] = '20';
            $tiene['21'] = '21';
        } else {
            $tiene['27'] = '27';
            $tiene['28'] = '28';
        }
        $kms = $this->RespuestaPregunta->find('all', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $tiene, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $recorridos = 0;
        foreach ($kms as $key => $km) {
            $recorridos = $recorridos + $km['RespuestaPregunta']['valor'];
        }
        $recorridos = $recorridos / 12 / $respuestaPregunta4['RespuestaPregunta']['valor'];

        $this->loadModel('Factore');
        $this->Factore->recursive = -1;
        $factore = $this->Factore->find('first', array(
            'conditions' => array('Factore.antiguedad_maxima' => $respuestaPregunta1['RespuestaPregunta']['valor'], 'Factore.estado_id <>' => '2'),
            'recursive' => -1
        ));

        if ($respuestaPregunta2['RespuestaPregunta']['valor'] < $factore['Factore']['antiguedad_maxima']) {
            $depreciacion = (1 - $factore['Factore']['valor_residual'] / 100) * (($factore['Factore']['antiguedad_maxima'] - $respuestaPregunta2['RespuestaPregunta']['valor']) / ($factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1) / 2));
            $deducir = (1 - (1 - $factore['Factore']['valor_residual'] / 100)) * ($factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1) / 2 - ($factore['Factore']['antiguedad_maxima'] - $respuestaPregunta2['RespuestaPregunta']['valor']) * (($factore['Factore']['antiguedad_maxima'] - $respuestaPregunta2['RespuestaPregunta']['valor']) + 1) / 2) / ($factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1) / 2);
        } else {
            $depreciacion = (1 - $factore['Factore']['valor_residual'] / 100) * ((1) / ($factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1) / 2));
            $deducir = (1 - (1 - $factore['Factore']['valor_residual'] / 100)) * ($factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1) / 2) / ($factore['Factore']['antiguedad_maxima'] * ($factore['Factore']['antiguedad_maxima'] + 1) / 2);
        }

        $factor_rem_maq_eq = 0.04 * ($respuestaParametro2['RespuestaParametro']['valor'] / 100 / 12);
        $factor_rem_edificios = 0.03 * ($respuestaParametro2['RespuestaParametro']['valor'] / 100 / 12);

        $dep_mensual_vehiculo = $respuestaParametro1['RespuestaParametro']['valor'] * $depreciacion / 12;
        $rem_mensual_vehiculo = $respuestaParametro1['RespuestaParametro']['valor'] * ($deducir * $respuestaParametro2['RespuestaParametro']['valor']) / 100 / 12;
        $rem_mensual_maq_eq = $respuestaParametro1['RespuestaParametro']['valor'] * $factor_rem_maq_eq;
        $rem_mensual_edificios = $respuestaParametro1['RespuestaParametro']['valor'] * $factor_rem_edificios;

        $costo_dep_km = $dep_mensual_vehiculo / $recorridos;
        $costo_rem_vehiculo_km = $rem_mensual_vehiculo / $recorridos;
        $costo_rem_maq_eq_km = $rem_mensual_maq_eq / $recorridos;
        $costo_rem_edificios_km = $rem_mensual_edificios / $recorridos;

        $costo = $costo_dep_km + $costo_rem_vehiculo_km + $costo_rem_maq_eq_km + $costo_rem_edificios_km;

        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = -1;
        $this->loadModel('Item');
        $this->Item->recursive = 0;
        $item = $this->Item->find('first', array(
            'conditions' => array('Item.id' => $item_id),
            'recursive' => 0
        ));
        $this->RespuestaItem->create();
        $respuestaItem['RespuestaItem']['consulta_id'] = $consulta_id;
        $respuestaItem['RespuestaItem']['item_id'] = $item['Item']['id'];
        $respuestaItem['RespuestaItem']['item'] = $item['Item']['nombre'];
        $respuestaItem['RespuestaItem']['valor'] = $costo;
        $respuestaItem['RespuestaItem']['incidencia_valor'] = 0;
        $respuestaItem['RespuestaItem']['minimo'] = $costo;
        $respuestaItem['RespuestaItem']['incidencia_minimo'] = 0;
        $respuestaItem['RespuestaItem']['maximo'] = $costo;
        $respuestaItem['RespuestaItem']['incidencia_maximo'] = 0;
        $respuestaItem['RespuestaItem']['unidade_id'] = $item['Unidade']['id'];
        $respuestaItem['RespuestaItem']['unidad'] = $item['Unidade']['nombre'];
        $respuestaItem['RespuestaItem']['estado_id'] = 1;
        $respuestaItem['RespuestaItem']['user_created'] = $this->Authake->getUserId();
        $respuestaItem['RespuestaItem']['user_modified'] = $this->Authake->getUserId();

        $respuestaItem['RespuestaItem']['inferior'] = $respuestaItem['RespuestaItem']['valor'] - ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['superior'] = $respuestaItem['RespuestaItem']['valor'] + ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['incidencia_inferior'] = 0;
        $respuestaItem['RespuestaItem']['incidencia_superior'] = 0;

        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = -1;
        $respuestaTipo = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $item['Item']['tipo_id'], 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $respuestaTipo['RespuestaTipo']['valor'] = $respuestaTipo['RespuestaTipo']['valor'] + $respuestaItem['RespuestaItem']['valor'];
        $respuestaTipo['RespuestaTipo']['inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] + $respuestaItem['RespuestaItem']['inferior'];
        $respuestaTipo['RespuestaTipo']['maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] + $respuestaItem['RespuestaItem']['maximo'];
        $respuestaTipo['RespuestaTipo']['minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] + $respuestaItem['RespuestaItem']['minimo'];
        $respuestaTipo['RespuestaTipo']['superior'] = $respuestaTipo['RespuestaTipo']['superior'] + $respuestaItem['RespuestaItem']['superior'];
        if (!$this->RespuestaTipo->save($respuestaTipo)) {
            return false;
        } else {
            return ($this->RespuestaItem->save($respuestaItem));
        }
    }

    /* 6) ITEM6: COSTO DEL CAPITAL PERSONAL */
    public function item6($item_id = null, $consulta_id = null, $parametro1_id = null, $parametro2_id = null, $pregunta1_id = null, $pregunta2_id = null, $pregunta3_id = null, $pregunta4_id = null, $pregunta5_id = null, $intervalo_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = -1;
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;

        $intervaloParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $intervalo_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro1 = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro1_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro2 = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro2_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta1 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta1_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta2 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta2_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta3 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta3_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta4 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta4_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta5 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta5_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->loadModel('RespuestaSalario');
        $this->RespuestaSalario->recursive = -1;
        $respuestaSalarios = $this->RespuestaSalario->find('all', array(
            'conditions' => array('RespuestaSalario.consulta_id' => $consulta_id, 'RespuestaSalario.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $cantidad_total = 0;
        $sueldo_ponderado = 0;
        $contribuciones_ponderado = 0;

        foreach ($respuestaSalarios as $key => $respuestaSalario) {
            $cantidad_total = $cantidad_total + $respuestaSalario['RespuestaSalario']['cantidad'];
            $sueldo_antiguedad = $respuestaSalario['RespuestaSalario']['salario'] + ($respuestaSalario['RespuestaSalario']['antiguedad'] * ($respuestaPregunta1['RespuestaPregunta']['valor']));
            $sueldo_ant_sac = $sueldo_antiguedad + ($sueldo_antiguedad * ($respuestaParametro1['RespuestaParametro']['valor'] / 100));
            $sueldo_ant_sac_vac = $sueldo_ant_sac + ($sueldo_antiguedad * ($respuestaParametro2['RespuestaParametro']['valor'] / 100));
            $contribuciones = $sueldo_ant_sac_vac * ($respuestaPregunta2['RespuestaPregunta']['valor'] / 100);
            $sueldo_ponderado = $sueldo_ponderado + ($sueldo_ant_sac_vac * $respuestaSalario['RespuestaSalario']['cantidad']);
            $contribuciones_ponderado = $contribuciones_ponderado + ($contribuciones * $respuestaSalario['RespuestaSalario']['cantidad']);
        }

        $prom_pond_sueldo = $sueldo_ponderado / $cantidad_total;
        $prom_pond_contribuciones = $contribuciones_ponderado / $cantidad_total;
        $empleados_vehiculos = $cantidad_total / $respuestaPregunta4['RespuestaPregunta']['valor'];

        $costo_empl_veh = ($prom_pond_sueldo + $prom_pond_contribuciones + $respuestaPregunta3['RespuestaPregunta']['valor']) * $empleados_vehiculos;

        //opcione_id = 24 --> SI; opcione_id = 25 --> NO
        $tiene = null;
        if ($respuestaPregunta5['RespuestaPregunta']['opcione_id'] == '24') {
            $tiene['10'] = '10';
            $tiene['11'] = '11';
            $tiene['12'] = '12';
            $tiene['13'] = '13';
            $tiene['14'] = '14';
            $tiene['15'] = '15';
            $tiene['16'] = '16';
            $tiene['17'] = '17';
            $tiene['18'] = '18';
            $tiene['19'] = '19';
            $tiene['20'] = '20';
            $tiene['21'] = '21';
        } else {
            $tiene['27'] = '27';
            $tiene['28'] = '28';
        }
        $kms = $this->RespuestaPregunta->find('all', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $tiene, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $recorridos = 0;
        foreach ($kms as $key => $km) {
            $recorridos = $recorridos + $km['RespuestaPregunta']['valor'];
        }
        $recorridos = $recorridos / 12 / $respuestaPregunta4['RespuestaPregunta']['valor'];


        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = -1;
        $this->loadModel('Item');
        $this->Item->recursive = 0;
        $item = $this->Item->find('first', array(
            'conditions' => array('Item.id' => $item_id),
            'recursive' => 0
        ));
        $this->RespuestaItem->create();
        $respuestaItem['RespuestaItem']['consulta_id'] = $consulta_id;
        $respuestaItem['RespuestaItem']['item_id'] = $item['Item']['id'];
        $respuestaItem['RespuestaItem']['item'] = $item['Item']['nombre'];
        $respuestaItem['RespuestaItem']['valor'] = $costo_empl_veh / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_valor'] = 0;
        $respuestaItem['RespuestaItem']['minimo'] = $costo_empl_veh / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_minimo'] = 0;
        $respuestaItem['RespuestaItem']['maximo'] = $costo_empl_veh / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_maximo'] = 0;
        $respuestaItem['RespuestaItem']['unidade_id'] = $item['Unidade']['id'];
        $respuestaItem['RespuestaItem']['unidad'] = $item['Unidade']['nombre'];
        $respuestaItem['RespuestaItem']['estado_id'] = 1;
        $respuestaItem['RespuestaItem']['user_created'] = $this->Authake->getUserId();
        $respuestaItem['RespuestaItem']['user_modified'] = $this->Authake->getUserId();

        $respuestaItem['RespuestaItem']['inferior'] = $respuestaItem['RespuestaItem']['valor'] - ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['superior'] = $respuestaItem['RespuestaItem']['valor'] + ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['incidencia_inferior'] = 0;
        $respuestaItem['RespuestaItem']['incidencia_superior'] = 0;

        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = -1;
        $respuestaTipo = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $item['Item']['tipo_id'], 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $respuestaTipo['RespuestaTipo']['valor'] = $respuestaTipo['RespuestaTipo']['valor'] + $respuestaItem['RespuestaItem']['valor'];
        $respuestaTipo['RespuestaTipo']['inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] + $respuestaItem['RespuestaItem']['inferior'];
        $respuestaTipo['RespuestaTipo']['maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] + $respuestaItem['RespuestaItem']['maximo'];
        $respuestaTipo['RespuestaTipo']['minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] + $respuestaItem['RespuestaItem']['minimo'];
        $respuestaTipo['RespuestaTipo']['superior'] = $respuestaTipo['RespuestaTipo']['superior'] + $respuestaItem['RespuestaItem']['superior'];
        if (!$this->RespuestaTipo->save($respuestaTipo)) {
            return false;
        } else {
            return ($this->RespuestaItem->save($respuestaItem));
        }
    }

    /* 9) ITEM9: COSTO DEL CAPITAL SUBE */
    public function item9($item_id = null, $consulta_id = null, $parametro_id = null, $pregunta1_id = null, $pregunta2_id = null, $intervalo_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $consulta_id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = -1;
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;

        $intervaloParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $intervalo_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta1 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta1_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta2 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta2_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        //opcione_id = 24 --> SI; opcione_id = 25 --> NO
        $tiene = null;
        if ($respuestaPregunta1['RespuestaPregunta']['opcione_id'] == '24') {
            $tiene['10'] = '10';
            $tiene['11'] = '11';
            $tiene['12'] = '12';
            $tiene['13'] = '13';
            $tiene['14'] = '14';
            $tiene['15'] = '15';
            $tiene['16'] = '16';
            $tiene['17'] = '17';
            $tiene['18'] = '18';
            $tiene['19'] = '19';
            $tiene['20'] = '20';
            $tiene['21'] = '21';
        } else {
            $tiene['27'] = '27';
            $tiene['28'] = '28';
        }
        $kms = $this->RespuestaPregunta->find('all', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $tiene, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $recorridos = 0;
        foreach ($kms as $key => $km) {
            $recorridos = $recorridos + $km['RespuestaPregunta']['valor'];
        }

        $this->loadModel('RespuestaPasajero');
        $this->RespuestaPasajero->recursive = -1;
        $pasajeros = $this->RespuestaPasajero->find('all', array(
            'conditions' => array('RespuestaPasajero.consulta_id' => $consulta_id, 'RespuestaPasajero.estado_id <>' => '2'),
            'recursive' => -1,
            'order' => array('RespuestaPasajero.base' => 'desc')
        ));

        $pax_eq_anio = 0;
        $base = $this->RespuestaPasajero->find('first', array(
            'conditions' => array('RespuestaPasajero.base' => '1', 'RespuestaPasajero.consulta_id' => $consulta_id, 'RespuestaPasajero.estado_id <>' => '2'),
            'recursive' => -1
        ));

        foreach ($pasajeros as $pax => $pasajero) {
            //opcione_id = 24 --> SI; opcione_id = 25 --> NO
            if ($respuestaPregunta1['RespuestaPregunta']['opcione_id'] == '24') {
                $pax_eq_anio = $pax_eq_anio + (($pasajero['RespuestaPasajero']['mes01'] + $pasajero['RespuestaPasajero']['mes02'] + $pasajero['RespuestaPasajero']['mes03'] + $pasajero['RespuestaPasajero']['mes04'] + $pasajero['RespuestaPasajero']['mes05'] + $pasajero['RespuestaPasajero']['mes06'] + $pasajero['RespuestaPasajero']['mes07'] + $pasajero['RespuestaPasajero']['mes08'] + $pasajero['RespuestaPasajero']['mes09'] + $pasajero['RespuestaPasajero']['mes10'] + $pasajero['RespuestaPasajero']['mes11'] + $pasajero['RespuestaPasajero']['mes12']) * ($pasajero['RespuestaPasajero']['costo'] / $base['RespuestaPasajero']['costo']));
            } else {
                $pax_eq_anio = $pax_eq_anio + (($pasajero['RespuestaPasajero']['semestre1'] + $pasajero['RespuestaPasajero']['semestre2']) * ($pasajero['RespuestaPasajero']['costo'] / $base['RespuestaPasajero']['costo']));
            }
        }

        $costo_sube = $pax_eq_anio * $base['RespuestaPasajero']['costo'] * ($respuestaParametro['RespuestaParametro']['valor'] / 100);

        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = -1;
        $this->loadModel('Item');
        $this->Item->recursive = 0;
        $item = $this->Item->find('first', array(
            'conditions' => array('Item.id' => $item_id),
            'recursive' => 0
        ));
        $this->RespuestaItem->create();
        $respuestaItem['RespuestaItem']['consulta_id'] = $consulta_id;
        $respuestaItem['RespuestaItem']['item_id'] = $item['Item']['id'];
        $respuestaItem['RespuestaItem']['item'] = $item['Item']['nombre'];
        $respuestaItem['RespuestaItem']['valor'] = $costo_sube / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_valor'] = 0;
        $respuestaItem['RespuestaItem']['minimo'] = $costo_sube / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_minimo'] = 0;
        $respuestaItem['RespuestaItem']['maximo'] = $costo_sube / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_maximo'] = 0;
        $respuestaItem['RespuestaItem']['unidade_id'] = $item['Unidade']['id'];
        $respuestaItem['RespuestaItem']['unidad'] = $item['Unidade']['nombre'];
        $respuestaItem['RespuestaItem']['estado_id'] = 1;
        $respuestaItem['RespuestaItem']['user_created'] = $this->Authake->getUserId();
        $respuestaItem['RespuestaItem']['user_modified'] = $this->Authake->getUserId();

        $respuestaItem['RespuestaItem']['inferior'] = $respuestaItem['RespuestaItem']['valor'] - ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['superior'] = $respuestaItem['RespuestaItem']['valor'] + ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['incidencia_inferior'] = 0;
        $respuestaItem['RespuestaItem']['incidencia_superior'] = 0;

        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = -1;
        $respuestaTipo = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $item['Item']['tipo_id'], 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaTipo['RespuestaTipo']['valor'] = $respuestaTipo['RespuestaTipo']['valor'] + $respuestaItem['RespuestaItem']['valor'];
        $respuestaTipo['RespuestaTipo']['inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] + $respuestaItem['RespuestaItem']['inferior'];
        $respuestaTipo['RespuestaTipo']['maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] + $respuestaItem['RespuestaItem']['maximo'];
        $respuestaTipo['RespuestaTipo']['minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] + $respuestaItem['RespuestaItem']['minimo'];
        $respuestaTipo['RespuestaTipo']['superior'] = $respuestaTipo['RespuestaTipo']['superior'] + $respuestaItem['RespuestaItem']['superior'];

        $consulta['Consulta']['ipk'] = $pax_eq_anio / $recorridos;
        $consulta['Consulta']['subsidio_pax'] = $respuestaPregunta2['RespuestaPregunta']['valor'] / $pax_eq_anio;

        if (!$this->Consulta->save($consulta)) {
            return false;
        } else {
            if (!$this->RespuestaTipo->save($respuestaTipo)) {
                return false;
            } else {
                return ($this->RespuestaItem->save($respuestaItem));
            }
        }
    }

    /* 7) ITEM7: COSTO DEL CAPITAL GTOS GRALES Y SEGURO: */
    public function item7($item_id = null, $consulta_id = null, $parametro1_id = null, $parametro2_id = null, $pregunta1_id = null, $pregunta2_id = null, $coeficiente_id = null, $intervalo_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = -1;
        $this->loadModel('RespuestaCoeficiente');
        $this->RespuestaCoeficiente->recursive = -1;
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;

        $intervaloParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $intervalo_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestacoeficiente = $this->RespuestaCoeficiente->find('first', array(
            'conditions' => array('RespuestaCoeficiente.coeficiente_id' => $coeficiente_id, 'RespuestaCoeficiente.consulta_id' => $consulta_id, 'RespuestaCoeficiente.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro1 = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro1_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro2 = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro2_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta1 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta1_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaPregunta2 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $pregunta2_id, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->loadModel('RespuestaSalario');
        $this->RespuestaSalario->recursive = -1;
        $respuestaSalarios = $this->RespuestaSalario->find('all', array(
            'conditions' => array('RespuestaSalario.consulta_id' => $consulta_id, 'RespuestaSalario.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $cantidad_total = 0;
        foreach ($respuestaSalarios as $sal => $respuestaSalario) {
            $cantidad_total = $cantidad_total + $respuestaSalario['RespuestaSalario']['cantidad'];
        }
        $empleados_vehiculos = $cantidad_total / $respuestaPregunta1['RespuestaPregunta']['valor'];

        //opcione_id = 24 --> SI; opcione_id = 25 --> NO
        $tiene = null;
        if ($respuestaPregunta2['RespuestaPregunta']['opcione_id'] == '24') {
            $tiene['10'] = '10';
            $tiene['11'] = '11';
            $tiene['12'] = '12';
            $tiene['13'] = '13';
            $tiene['14'] = '14';
            $tiene['15'] = '15';
            $tiene['16'] = '16';
            $tiene['17'] = '17';
            $tiene['18'] = '18';
            $tiene['19'] = '19';
            $tiene['20'] = '20';
            $tiene['21'] = '21';
        } else {
            $tiene['27'] = '27';
            $tiene['28'] = '28';
        }
        $kms = $this->RespuestaPregunta->find('all', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => $tiene, 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $recorridos = 0;
        foreach ($kms as $key => $km) {
            $recorridos = $recorridos + $km['RespuestaPregunta']['valor'];
        }
        $recorridos = $recorridos / 12 / $respuestaPregunta1['RespuestaPregunta']['valor'];

        $servicios_publicos = 650 * $empleados_vehiculos / 12;
        $gastos_generales = $respuestaParametro2['RespuestaParametro']['valor'] * $respuestacoeficiente['RespuestaCoeficiente']['valor'];
        $gastos_generales_min = $respuestaParametro2['RespuestaParametro']['valor'] * $respuestacoeficiente['RespuestaCoeficiente']['minimo'];
        $gastos_generales_max = $respuestaParametro2['RespuestaParametro']['valor'] * $respuestacoeficiente['RespuestaCoeficiente']['maximo'];

        $gastos_seguros_uniformes = $servicios_publicos + $respuestaParametro1['RespuestaParametro']['valor'] + $gastos_generales;
        $gastos_seguros_uniformes_min = $servicios_publicos + $respuestaParametro1['RespuestaParametro']['valor'] + $gastos_generales_min;
        $gastos_seguros_uniformes_max = $servicios_publicos + $respuestaParametro1['RespuestaParametro']['valor'] + $gastos_generales_max;

        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = -1;
        $this->loadModel('Item');
        $this->Item->recursive = 0;
        $item = $this->Item->find('first', array(
            'conditions' => array('Item.id' => $item_id),
            'recursive' => 0
        ));
        $this->RespuestaItem->create();
        $respuestaItem['RespuestaItem']['consulta_id'] = $consulta_id;
        $respuestaItem['RespuestaItem']['item_id'] = $item['Item']['id'];
        $respuestaItem['RespuestaItem']['item'] = $item['Item']['nombre'];
        $respuestaItem['RespuestaItem']['valor'] = $gastos_seguros_uniformes / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_valor'] = 0;
        $respuestaItem['RespuestaItem']['minimo'] = $gastos_seguros_uniformes_min / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_minimo'] = 0;
        $respuestaItem['RespuestaItem']['maximo'] = $gastos_seguros_uniformes_max / $recorridos;
        $respuestaItem['RespuestaItem']['incidencia_maximo'] = 0;
        $respuestaItem['RespuestaItem']['unidade_id'] = $item['Unidade']['id'];
        $respuestaItem['RespuestaItem']['unidad'] = $item['Unidade']['nombre'];
        $respuestaItem['RespuestaItem']['estado_id'] = 1;
        $respuestaItem['RespuestaItem']['user_created'] = $this->Authake->getUserId();
        $respuestaItem['RespuestaItem']['user_modified'] = $this->Authake->getUserId();

        $respuestaItem['RespuestaItem']['inferior'] = $respuestaItem['RespuestaItem']['valor'] - ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['superior'] = $respuestaItem['RespuestaItem']['valor'] + ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['incidencia_inferior'] = 0;
        $respuestaItem['RespuestaItem']['incidencia_superior'] = 0;

        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = -1;
        $respuestaTipo = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $item['Item']['tipo_id'], 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $respuestaTipo['RespuestaTipo']['valor'] = $respuestaTipo['RespuestaTipo']['valor'] + $respuestaItem['RespuestaItem']['valor'];
        $respuestaTipo['RespuestaTipo']['inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] + $respuestaItem['RespuestaItem']['inferior'];
        $respuestaTipo['RespuestaTipo']['maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] + $respuestaItem['RespuestaItem']['maximo'];
        $respuestaTipo['RespuestaTipo']['minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] + $respuestaItem['RespuestaItem']['minimo'];
        $respuestaTipo['RespuestaTipo']['superior'] = $respuestaTipo['RespuestaTipo']['superior'] + $respuestaItem['RespuestaItem']['superior'];
        if (!$this->RespuestaTipo->save($respuestaTipo)) {
            return false;
        } else {
            return ($this->RespuestaItem->save($respuestaItem));
        }
    }


    /* 8) ITEM8: IMPUESTOS Y TASAS: */
    //Parametro1: "ALÍCUOTA DE IMPUESTOS MENSUALES": 33
    public function item8($item_id = null, $consulta_id = null, $parametro_id = null, $tipo1_id = null, $tipo2_id = null, $intervalo_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $consulta_id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = -1;
        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = -1;
        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = -1;
        $this->loadModel('Item');
        $this->Item->recursive = 0;

        $intervaloParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $intervalo_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaParametro = $this->RespuestaParametro->find('first', array(
            'conditions' => array('RespuestaParametro.parametro_id' => $parametro_id, 'RespuestaParametro.consulta_id' => $consulta_id, 'RespuestaParametro.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaTipo1 = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $tipo1_id, 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $respuestaTipo2 = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $tipo2_id, 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $item = $this->Item->find('first', array(
            'conditions' => array('Item.id' => $item_id),
            'recursive' => 0
        ));
        $this->RespuestaItem->create();
        $respuestaItem['RespuestaItem']['consulta_id'] = $consulta_id;
        $respuestaItem['RespuestaItem']['item_id'] = $item['Item']['id'];
        $respuestaItem['RespuestaItem']['item'] = $item['Item']['nombre'];
        $respuestaItem['RespuestaItem']['valor'] = (($respuestaTipo1['RespuestaTipo']['valor'] + $respuestaTipo2['RespuestaTipo']['valor']) / (1 - ($respuestaParametro['RespuestaParametro']['valor'] / 100))) * $respuestaParametro['RespuestaParametro']['valor'] / 100;
        $respuestaItem['RespuestaItem']['incidencia_valor'] = $respuestaParametro['RespuestaParametro']['valor'] / 100;
        $respuestaItem['RespuestaItem']['minimo'] = (($respuestaTipo1['RespuestaTipo']['minimo'] + $respuestaTipo2['RespuestaTipo']['minimo']) / (1 - ($respuestaParametro['RespuestaParametro']['valor'] / 100))) * $respuestaParametro['RespuestaParametro']['valor'] / 100;;
        $respuestaItem['RespuestaItem']['incidencia_minimo'] = $respuestaParametro['RespuestaParametro']['valor'] / 100;
        $respuestaItem['RespuestaItem']['maximo'] = (($respuestaTipo1['RespuestaTipo']['maximo'] + $respuestaTipo2['RespuestaTipo']['maximo']) / (1 - ($respuestaParametro['RespuestaParametro']['valor'] / 100))) * $respuestaParametro['RespuestaParametro']['valor'] / 100;;
        $respuestaItem['RespuestaItem']['incidencia_maximo'] = $respuestaParametro['RespuestaParametro']['valor'] / 100;
        $respuestaItem['RespuestaItem']['unidade_id'] = $item['Unidade']['id'];
        $respuestaItem['RespuestaItem']['unidad'] = $item['Unidade']['nombre'];
        $respuestaItem['RespuestaItem']['estado_id'] = 1;
        $respuestaItem['RespuestaItem']['user_created'] = $this->Authake->getUserId();
        $respuestaItem['RespuestaItem']['user_modified'] = $this->Authake->getUserId();

        $respuestaItem['RespuestaItem']['inferior'] = $respuestaItem['RespuestaItem']['valor'] - ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['superior'] = $respuestaItem['RespuestaItem']['valor'] + ($respuestaItem['RespuestaItem']['valor'] * ($intervaloParametro['RespuestaParametro']['valor'] / 100));
        $respuestaItem['RespuestaItem']['incidencia_inferior'] = 0;
        $respuestaItem['RespuestaItem']['incidencia_superior'] = 0;

        $respuestaTipo = $this->RespuestaTipo->find('first', array(
            'conditions' => array('RespuestaTipo.tipo_id' => $item['Item']['tipo_id'], 'RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));
        $respuestaTipo['RespuestaTipo']['valor'] = $respuestaTipo['RespuestaTipo']['valor'] + $respuestaItem['RespuestaItem']['valor'];
        $respuestaTipo['RespuestaTipo']['inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] + $respuestaItem['RespuestaItem']['inferior'];
        $respuestaTipo['RespuestaTipo']['maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] + $respuestaItem['RespuestaItem']['maximo'];
        $respuestaTipo['RespuestaTipo']['minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] + $respuestaItem['RespuestaItem']['minimo'];
        $respuestaTipo['RespuestaTipo']['superior'] = $respuestaTipo['RespuestaTipo']['superior'] + $respuestaItem['RespuestaItem']['superior'];

        if (!$this->RespuestaTipo->save($respuestaTipo)) {
            return false;
        } else {
            $consulta['Consulta']['costo'] = $respuestaTipo['RespuestaTipo']['valor'] + $respuestaTipo1['RespuestaTipo']['valor'] + $respuestaTipo2['RespuestaTipo']['valor'];
            $consulta['Consulta']['costo_minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] + $respuestaTipo1['RespuestaTipo']['minimo'] + $respuestaTipo2['RespuestaTipo']['minimo'];
            $consulta['Consulta']['costo_inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] + $respuestaTipo1['RespuestaTipo']['inferior'] + $respuestaTipo2['RespuestaTipo']['inferior'];
            $consulta['Consulta']['costo_maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] + $respuestaTipo1['RespuestaTipo']['maximo'] + $respuestaTipo2['RespuestaTipo']['maximo'];
            $consulta['Consulta']['costo_superior'] = $respuestaTipo['RespuestaTipo']['superior'] + $respuestaTipo1['RespuestaTipo']['superior'] + $respuestaTipo2['RespuestaTipo']['superior'];

            $consulta['Consulta']['tarifa'] = $consulta['Consulta']['costo'] / $consulta['Consulta']['ipk'];
            $consulta['Consulta']['tarifa_minima'] = $consulta['Consulta']['costo_minimo'] / $consulta['Consulta']['ipk'];
            $consulta['Consulta']['tarifa_maxima'] = $consulta['Consulta']['costo_maximo'] / $consulta['Consulta']['ipk'];
            $consulta['Consulta']['tarifa_inferior'] = $consulta['Consulta']['costo_inferior'] / $consulta['Consulta']['ipk'];
            $consulta['Consulta']['tarifa_superior'] = $consulta['Consulta']['costo_superior'] / $consulta['Consulta']['ipk'];

            $consulta['Consulta']['subsidio'] = $consulta['Consulta']['tarifa'] - $consulta['Consulta']['subsidio_pax'];
            $consulta['Consulta']['subsidio_minimo'] = $consulta['Consulta']['tarifa_minima'] - $consulta['Consulta']['subsidio_pax'];
            $consulta['Consulta']['subsidio_maximo'] = $consulta['Consulta']['tarifa_maxima'] - $consulta['Consulta']['subsidio_pax'];
            $consulta['Consulta']['subsidio_inferior'] = $consulta['Consulta']['tarifa_inferior'] - $consulta['Consulta']['subsidio_pax'];
            $consulta['Consulta']['subsidio_superior'] = $consulta['Consulta']['tarifa_superior'] - $consulta['Consulta']['subsidio_pax'];

            if (!$this->Consulta->save($consulta)) {
                return false;
            } else {
                return ($this->RespuestaItem->save($respuestaItem));
            }
        }
    }

    /*
     * Cálculo de Incidencias
     * */
    public function incidencias($consulta_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $consulta_id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = -1;
        $respuestaItems = $this->RespuestaItem->find('all', array(
            'conditions' => array('RespuestaItem.consulta_id' => $consulta_id, 'RespuestaItem.estado_id <>' => '2'),
            'recursive' => -1
        ));
        foreach ($respuestaItems as $key_item => $respuestaItem) {
            $respuestaItem['RespuestaItem']['incidencia_valor'] = $respuestaItem['RespuestaItem']['valor'] / $consulta['Consulta']['costo'];
            $respuestaItem['RespuestaItem']['incidencia_minimo'] = $respuestaItem['RespuestaItem']['minimo'] / $consulta['Consulta']['costo_minimo'];
            $respuestaItem['RespuestaItem']['incidencia_maximo'] = $respuestaItem['RespuestaItem']['maximo'] / $consulta['Consulta']['costo_maximo'];
            $respuestaItem['RespuestaItem']['incidencia_inferior'] = $respuestaItem['RespuestaItem']['inferior'] / $consulta['Consulta']['costo_inferior'];
            $respuestaItem['RespuestaItem']['incidencia_superior'] = $respuestaItem['RespuestaItem']['superior'] / $consulta['Consulta']['costo_superior'];

            $this->RespuestaItem->save($respuestaItem);
        }

        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = -1;
        $respuestaTipos = $this->RespuestaTipo->find('all', array(
            'conditions' => array('RespuestaTipo.consulta_id' => $consulta_id, 'RespuestaTipo.estado_id <>' => '2'),
            'recursive' => -1
        ));
        foreach ($respuestaTipos as $key_tipo => $respuestaTipo) {
            $respuestaTipo['RespuestaTipo']['incidencia_valor'] = $respuestaTipo['RespuestaTipo']['valor'] / $consulta['Consulta']['costo'];
            $respuestaTipo['RespuestaTipo']['incidencia_minimo'] = $respuestaTipo['RespuestaTipo']['minimo'] / $consulta['Consulta']['costo_minimo'];
            $respuestaTipo['RespuestaTipo']['incidencia_maximo'] = $respuestaTipo['RespuestaTipo']['maximo'] / $consulta['Consulta']['costo_maximo'];
            $respuestaTipo['RespuestaTipo']['incidencia_inferior'] = $respuestaTipo['RespuestaTipo']['inferior'] / $consulta['Consulta']['costo_inferior'];
            $respuestaTipo['RespuestaTipo']['incidencia_superior'] = $respuestaTipo['RespuestaTipo']['superior'] / $consulta['Consulta']['costo_superior'];
            $this->RespuestaTipo->save($respuestaTipo);
        }
    }

    /*
     * Cálculo de Indicadores:
     * */
    public function indicadores($consulta_id = null)
    {
        $this->Consulta->id = $consulta_id;
        if (!$this->Consulta->exists()) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $consulta_id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('Indicadore');
        $this->Indicadore->recursive = 0;
        $this->loadModel('Alerta');
        $this->Alerta->recursive = 0;
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;
        $this->loadModel('RespuestaSalario');
        $this->RespuestaSalario->recursive = -1;
        $this->loadModel('RespuestaIndicadore');
        $this->RespuestaIndicadore->recursive = -1;

        /*
         * Indicador 1: 2.5. Indicador de utilización de conductores.
         * */
        $indicador_1 = $this->Indicadore->find('first', array(
            'conditions' => array('Indicadore.id' => '1', 'Indicadore.estado_id <>' => '2'),
            'recursive' => 0
        ));

        $alertas_1 = $this->Alerta->find('all', array(
            'conditions' => array('Alerta.indicadore_id' => '1', 'Alerta.estado_id <>' => '2'),
            'recursive' => 0
        ));

        // Flota total de coches
        $respuestaPregunta_1 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '9', 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        // Omnibus de Auxilio
        $respuestaPregunta_2 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '30', 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        // Choferes de Guarda
        $respuestaSalario_1 = $this->RespuestaSalario->find('first', array(
            'conditions' => array('RespuestaSalario.categoria_id' => '2', 'RespuestaSalario.consulta_id' => $consulta_id, 'RespuestaSalario.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->RespuestaIndicadore->create();
        $respuestaIndicadore_1['RespuestaIndicadore']['consulta_id'] = $consulta_id;
        $respuestaIndicadore_1['RespuestaIndicadore']['indicadore_id'] = $indicador_1['Indicadore']['id'];
        $respuestaIndicadore_1['RespuestaIndicadore']['indicador'] = $indicador_1['Indicadore']['nombre'];
        $respuestaIndicadore_1['RespuestaIndicadore']['valor'] = $respuestaSalario_1['RespuestaSalario']['cantidad'] / ($respuestaPregunta_1['RespuestaPregunta']['valor'] - $respuestaPregunta_2['RespuestaPregunta']['valor']);

        foreach ($alertas_1 as $alerta_1) {

            if($alerta_1['Alerta']['menor'] == '1'){

                if($respuestaIndicadore_1['RespuestaIndicadore']['valor'] <= $alerta_1['Alerta']['maximo']){
                    $respuestaIndicadore_1['RespuestaIndicadore']['alerta_id'] = $alerta_1['Alerta']['id'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['evento_id'] = $alerta_1['Alerta']['evento_id'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['alerta'] = $alerta_1['Alerta']['nombre'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['notificar'] = $alerta_1['Alerta']['notificar'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['mensaje'] = $alerta_1['Alerta']['mensaje'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['evento'] = $alerta_1['Evento']['nombre'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['color'] = $alerta_1['Evento']['color'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['menor'] = $alerta_1['Alerta']['menor'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['minimo'] = $alerta_1['Alerta']['minimo'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['maximo'] = $alerta_1['Alerta']['maximo'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['mayor'] = $alerta_1['Alerta']['mayor'];
                }

            } else if($alerta_1['Alerta']['mayor'] == '1'){

                if($respuestaIndicadore_1['RespuestaIndicadore']['valor'] >= $alerta_1['Alerta']['minimo']){
                    $respuestaIndicadore_1['RespuestaIndicadore']['alerta_id'] = $alerta_1['Alerta']['id'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['evento_id'] = $alerta_1['Alerta']['evento_id'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['alerta'] = $alerta_1['Alerta']['nombre'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['notificar'] = $alerta_1['Alerta']['notificar'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['mensaje'] = $alerta_1['Alerta']['mensaje'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['evento'] = $alerta_1['Evento']['nombre'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['color'] = $alerta_1['Evento']['color'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['menor'] = $alerta_1['Alerta']['menor'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['minimo'] = $alerta_1['Alerta']['minimo'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['maximo'] = $alerta_1['Alerta']['maximo'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['mayor'] = $alerta_1['Alerta']['mayor'];
                }

            } else{

                if(($respuestaIndicadore_1['RespuestaIndicadore']['valor'] <= $alerta_1['Alerta']['maximo']) && ($respuestaIndicadore_1['RespuestaIndicadore']['valor'] >= $alerta_1['Alerta']['minimo'])){
                    $respuestaIndicadore_1['RespuestaIndicadore']['alerta_id'] = $alerta_1['Alerta']['id'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['evento_id'] = $alerta_1['Alerta']['evento_id'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['alerta'] = $alerta_1['Alerta']['nombre'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['notificar'] = $alerta_1['Alerta']['notificar'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['mensaje'] = $alerta_1['Alerta']['mensaje'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['evento'] = $alerta_1['Evento']['nombre'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['color'] = $alerta_1['Evento']['color'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['menor'] = $alerta_1['Alerta']['menor'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['minimo'] = $alerta_1['Alerta']['minimo'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['maximo'] = $alerta_1['Alerta']['maximo'];
                    $respuestaIndicadore_1['RespuestaIndicadore']['mayor'] = $alerta_1['Alerta']['mayor'];
                }

            }
        }

        $respuestaIndicadore_1['RespuestaIndicadore']['unidade_id'] = $indicador_1['Unidade']['id'];
        $respuestaIndicadore_1['RespuestaIndicadore']['unidad'] = $indicador_1['Unidade']['nombre'];
        $respuestaIndicadore_1['RespuestaIndicadore']['estado_id'] = 1;
        $respuestaIndicadore_1['RespuestaIndicadore']['user_created'] = $this->Authake->getUserId();
        $respuestaIndicadore_1['RespuestaIndicadore']['user_modified'] = $this->Authake->getUserId();

        if (!$this->RespuestaIndicadore->save($respuestaIndicadore_1)) {
            return false;
        }

        /*
         * Indicador 2: 2.1. Indicador de infraestructura.
         * */
        $indicador_2 = $this->Indicadore->find('first', array(
            'conditions' => array('Indicadore.id' => '2', 'Indicadore.estado_id <>' => '2'),
            'recursive' => 0
        ));

        $alertas_2 = $this->Alerta->find('all', array(
            'conditions' => array('Alerta.indicadore_id' => '2', 'Alerta.estado_id <>' => '2'),
            'recursive' => 0
        ));

        // ¿Cuál es el porcentaje de calles pavimentadas en la red de transporte público?
        $respuestaPregunta_3 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '2', 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        // ¿Qué porcentaje de calles recorridas se encuentra en buen estado?
        $respuestaPregunta_4 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '3', 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->RespuestaIndicadore->create();
        $respuestaIndicadore_2['RespuestaIndicadore']['consulta_id'] = $consulta_id;
        $respuestaIndicadore_2['RespuestaIndicadore']['indicadore_id'] = $indicador_2['Indicadore']['id'];
        $respuestaIndicadore_2['RespuestaIndicadore']['indicador'] = $indicador_2['Indicadore']['nombre'];
        $respuestaIndicadore_2['RespuestaIndicadore']['valor'] = $respuestaPregunta_3['RespuestaPregunta']['valor'] * $respuestaPregunta_4['RespuestaPregunta']['valor'];

        foreach ($alertas_2 as $alerta_2) {

            if($alerta_2['Alerta']['menor'] == '1'){

                if($respuestaIndicadore_2['RespuestaIndicadore']['valor'] <= $alerta_2['Alerta']['maximo']){
                    $respuestaIndicadore_2['RespuestaIndicadore']['alerta_id'] = $alerta_2['Alerta']['id'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['evento_id'] = $alerta_2['Alerta']['evento_id'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['alerta'] = $alerta_2['Alerta']['nombre'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['notificar'] = $alerta_2['Alerta']['notificar'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['mensaje'] = $alerta_2['Alerta']['mensaje'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['evento'] = $alerta_2['Evento']['nombre'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['color'] = $alerta_2['Evento']['color'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['menor'] = $alerta_2['Alerta']['menor'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['minimo'] = $alerta_2['Alerta']['minimo'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['maximo'] = $alerta_2['Alerta']['maximo'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['mayor'] = $alerta_2['Alerta']['mayor'];
                }

            } else if($alerta_2['Alerta']['mayor'] == '1'){

                if($respuestaIndicadore_2['RespuestaIndicadore']['valor'] >= $alerta_2['Alerta']['minimo']){
                    $respuestaIndicadore_2['RespuestaIndicadore']['alerta_id'] = $alerta_2['Alerta']['id'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['evento_id'] = $alerta_2['Alerta']['evento_id'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['alerta'] = $alerta_2['Alerta']['nombre'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['notificar'] = $alerta_2['Alerta']['notificar'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['mensaje'] = $alerta_2['Alerta']['mensaje'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['evento'] = $alerta_2['Evento']['nombre'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['color'] = $alerta_2['Evento']['color'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['menor'] = $alerta_2['Alerta']['menor'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['minimo'] = $alerta_2['Alerta']['minimo'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['maximo'] = $alerta_2['Alerta']['maximo'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['mayor'] = $alerta_2['Alerta']['mayor'];
                }

            } else{

                if(($respuestaIndicadore_2['RespuestaIndicadore']['valor'] <= $alerta_2['Alerta']['maximo']) && ($respuestaIndicadore_2['RespuestaIndicadore']['valor'] >= $alerta_2['Alerta']['minimo'])){
                    $respuestaIndicadore_2['RespuestaIndicadore']['alerta_id'] = $alerta_2['Alerta']['id'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['evento_id'] = $alerta_2['Alerta']['evento_id'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['alerta'] = $alerta_2['Alerta']['nombre'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['notificar'] = $alerta_2['Alerta']['notificar'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['mensaje'] = $alerta_2['Alerta']['mensaje'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['evento'] = $alerta_2['Evento']['nombre'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['color'] = $alerta_2['Evento']['color'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['menor'] = $alerta_2['Alerta']['menor'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['minimo'] = $alerta_2['Alerta']['minimo'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['maximo'] = $alerta_2['Alerta']['maximo'];
                    $respuestaIndicadore_2['RespuestaIndicadore']['mayor'] = $alerta_2['Alerta']['mayor'];
                }

            }
        }

        $respuestaIndicadore_2['RespuestaIndicadore']['unidade_id'] = $indicador_2['Unidade']['id'];
        $respuestaIndicadore_2['RespuestaIndicadore']['unidad'] = $indicador_2['Unidade']['nombre'];
        $respuestaIndicadore_2['RespuestaIndicadore']['estado_id'] = 1;
        $respuestaIndicadore_2['RespuestaIndicadore']['user_created'] = $this->Authake->getUserId();
        $respuestaIndicadore_2['RespuestaIndicadore']['user_modified'] = $this->Authake->getUserId();

        if (!$this->RespuestaIndicadore->save($respuestaIndicadore_2)) {
            return false;
        }

        /*
         * Indicador 3: 2.2. Indicador de paradas.
         * */
        $indicador_3 = $this->Indicadore->find('first', array(
            'conditions' => array('Indicadore.id' => '3', 'Indicadore.estado_id <>' => '2'),
            'recursive' => 0
        ));

        $alertas_3 = $this->Alerta->find('all', array(
            'conditions' => array('Alerta.indicadore_id' => '3', 'Alerta.estado_id <>' => '2'),
            'recursive' => 0
        ));

        // ¿Qué distancia promedio existe entre paradas?
        $respuestaPregunta_5 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '1', 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->RespuestaIndicadore->create();
        $respuestaIndicadore_3['RespuestaIndicadore']['consulta_id'] = $consulta_id;
        $respuestaIndicadore_3['RespuestaIndicadore']['indicadore_id'] = $indicador_3['Indicadore']['id'];
        $respuestaIndicadore_3['RespuestaIndicadore']['indicador'] = $indicador_3['Indicadore']['nombre'];
        $respuestaIndicadore_3['RespuestaIndicadore']['valor'] = $respuestaPregunta_5['RespuestaPregunta']['valor'];

        foreach ($alertas_3 as $alerta_3) {

            if($alerta_3['Alerta']['menor'] == '1'){

                if($respuestaIndicadore_3['RespuestaIndicadore']['valor'] <= $alerta_3['Alerta']['maximo']){
                    $respuestaIndicadore_3['RespuestaIndicadore']['alerta_id'] = $alerta_3['Alerta']['id'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['evento_id'] = $alerta_3['Alerta']['evento_id'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['alerta'] = $alerta_3['Alerta']['nombre'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['notificar'] = $alerta_3['Alerta']['notificar'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['mensaje'] = $alerta_3['Alerta']['mensaje'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['evento'] = $alerta_3['Evento']['nombre'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['color'] = $alerta_3['Evento']['color'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['menor'] = $alerta_3['Alerta']['menor'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['minimo'] = $alerta_3['Alerta']['minimo'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['maximo'] = $alerta_3['Alerta']['maximo'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['mayor'] = $alerta_3['Alerta']['mayor'];
                }

            } else if($alerta_3['Alerta']['mayor'] == '1'){

                if($respuestaIndicadore_3['RespuestaIndicadore']['valor'] >= $alerta_3['Alerta']['minimo']){
                    $respuestaIndicadore_3['RespuestaIndicadore']['alerta_id'] = $alerta_3['Alerta']['id'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['evento_id'] = $alerta_3['Alerta']['evento_id'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['alerta'] = $alerta_3['Alerta']['nombre'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['notificar'] = $alerta_3['Alerta']['notificar'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['mensaje'] = $alerta_3['Alerta']['mensaje'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['evento'] = $alerta_3['Evento']['nombre'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['color'] = $alerta_3['Evento']['color'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['menor'] = $alerta_3['Alerta']['menor'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['minimo'] = $alerta_3['Alerta']['minimo'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['maximo'] = $alerta_3['Alerta']['maximo'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['mayor'] = $alerta_3['Alerta']['mayor'];
                }

            } else{

                if(($respuestaIndicadore_3['RespuestaIndicadore']['valor'] <= $alerta_3['Alerta']['maximo']) && ($respuestaIndicadore_3['RespuestaIndicadore']['valor'] >= $alerta_3['Alerta']['minimo'])){
                    $respuestaIndicadore_3['RespuestaIndicadore']['alerta_id'] = $alerta_3['Alerta']['id'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['evento_id'] = $alerta_3['Alerta']['evento_id'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['alerta'] = $alerta_3['Alerta']['nombre'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['notificar'] = $alerta_3['Alerta']['notificar'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['mensaje'] = $alerta_3['Alerta']['mensaje'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['evento'] = $alerta_3['Evento']['nombre'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['color'] = $alerta_3['Evento']['color'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['menor'] = $alerta_3['Alerta']['menor'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['minimo'] = $alerta_3['Alerta']['minimo'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['maximo'] = $alerta_3['Alerta']['maximo'];
                    $respuestaIndicadore_3['RespuestaIndicadore']['mayor'] = $alerta_3['Alerta']['mayor'];
                }

            }
        }

        $respuestaIndicadore_3['RespuestaIndicadore']['unidade_id'] = $indicador_3['Unidade']['id'];
        $respuestaIndicadore_3['RespuestaIndicadore']['unidad'] = $indicador_3['Unidade']['nombre'];
        $respuestaIndicadore_3['RespuestaIndicadore']['estado_id'] = 1;
        $respuestaIndicadore_3['RespuestaIndicadore']['user_created'] = $this->Authake->getUserId();
        $respuestaIndicadore_3['RespuestaIndicadore']['user_modified'] = $this->Authake->getUserId();

        if (!$this->RespuestaIndicadore->save($respuestaIndicadore_3)) {
            return false;
        }

        /*
         * Indicador 4: 2.3. Indicador de costos estructurales.
         * */
        $indicador_4 = $this->Indicadore->find('first', array(
            'conditions' => array('Indicadore.id' => '4', 'Indicadore.estado_id <>' => '2'),
            'recursive' => 0
        ));

        $alertas_4 = $this->Alerta->find('all', array(
            'conditions' => array('Alerta.indicadore_id' => '4', 'Alerta.estado_id <>' => '2'),
            'recursive' => 0
        ));

        // ¿Cuántas empresas prestadoras existen en la ciudad de estudio?
        $respuestaPregunta_6 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '6', 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->RespuestaIndicadore->create();
        $respuestaIndicadore_4['RespuestaIndicadore']['consulta_id'] = $consulta_id;
        $respuestaIndicadore_4['RespuestaIndicadore']['indicadore_id'] = $indicador_4['Indicadore']['id'];
        $respuestaIndicadore_4['RespuestaIndicadore']['indicador'] = $indicador_4['Indicadore']['nombre'];

/*        if($respuestaPregunta_6['RespuestaPregunta']['valor'] <= '1'){
            $respuestaIndicadore_4['RespuestaIndicadore']['valor'] = 0;
        } if($respuestaPregunta_6['RespuestaPregunta']['valor'] > '1' && $respuestaPregunta_6['RespuestaPregunta']['valor'] <= '2'){
            $respuestaIndicadore_4['RespuestaIndicadore']['valor'] = 0.33;
        } if($respuestaPregunta_6['RespuestaPregunta']['valor'] > '2' && $respuestaPregunta_6['RespuestaPregunta']['valor'] <= '3'){
            $respuestaIndicadore_4['RespuestaIndicadore']['valor'] = 0.66;
        } if($respuestaPregunta_6['RespuestaPregunta']['valor'] > '3'){
            $respuestaIndicadore_4['RespuestaIndicadore']['valor'] = 1;
        }*/

        $respuestaIndicadore_4['RespuestaIndicadore']['valor'] = $respuestaPregunta_6['RespuestaPregunta']['valor'];

        foreach ($alertas_4 as $alerta_4) {

            if($alerta_4['Alerta']['menor'] == '1'){

                if($respuestaIndicadore_4['RespuestaIndicadore']['valor'] <= $alerta_4['Alerta']['maximo']){
                    $respuestaIndicadore_4['RespuestaIndicadore']['alerta_id'] = $alerta_4['Alerta']['id'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['evento_id'] = $alerta_4['Alerta']['evento_id'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['alerta'] = $alerta_4['Alerta']['nombre'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['notificar'] = $alerta_4['Alerta']['notificar'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['mensaje'] = $alerta_4['Alerta']['mensaje'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['evento'] = $alerta_4['Evento']['nombre'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['color'] = $alerta_4['Evento']['color'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['menor'] = $alerta_4['Alerta']['menor'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['minimo'] = $alerta_4['Alerta']['minimo'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['maximo'] = $alerta_4['Alerta']['maximo'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['mayor'] = $alerta_4['Alerta']['mayor'];
                }

            } else if($alerta_4['Alerta']['mayor'] == '1'){

                if($respuestaIndicadore_4['RespuestaIndicadore']['valor'] >= $alerta_4['Alerta']['minimo']){
                    $respuestaIndicadore_4['RespuestaIndicadore']['alerta_id'] = $alerta_4['Alerta']['id'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['evento_id'] = $alerta_4['Alerta']['evento_id'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['alerta'] = $alerta_4['Alerta']['nombre'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['notificar'] = $alerta_4['Alerta']['notificar'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['mensaje'] = $alerta_4['Alerta']['mensaje'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['evento'] = $alerta_4['Evento']['nombre'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['color'] = $alerta_4['Evento']['color'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['menor'] = $alerta_4['Alerta']['menor'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['minimo'] = $alerta_4['Alerta']['minimo'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['maximo'] = $alerta_4['Alerta']['maximo'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['mayor'] = $alerta_4['Alerta']['mayor'];
                }

            } else{

                if(($respuestaIndicadore_4['RespuestaIndicadore']['valor'] <= $alerta_4['Alerta']['maximo']) && ($respuestaIndicadore_4['RespuestaIndicadore']['valor'] >= $alerta_4['Alerta']['minimo'])){
                    $respuestaIndicadore_4['RespuestaIndicadore']['alerta_id'] = $alerta_4['Alerta']['id'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['evento_id'] = $alerta_4['Alerta']['evento_id'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['alerta'] = $alerta_4['Alerta']['nombre'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['notificar'] = $alerta_4['Alerta']['notificar'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['mensaje'] = $alerta_4['Alerta']['mensaje'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['evento'] = $alerta_4['Evento']['nombre'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['color'] = $alerta_4['Evento']['color'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['menor'] = $alerta_4['Alerta']['menor'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['minimo'] = $alerta_4['Alerta']['minimo'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['maximo'] = $alerta_4['Alerta']['maximo'];
                    $respuestaIndicadore_4['RespuestaIndicadore']['mayor'] = $alerta_4['Alerta']['mayor'];
                }

            }
        }

        $respuestaIndicadore_4['RespuestaIndicadore']['unidade_id'] = $indicador_4['Unidade']['id'];
        $respuestaIndicadore_4['RespuestaIndicadore']['unidad'] = $indicador_4['Unidade']['nombre'];
        $respuestaIndicadore_4['RespuestaIndicadore']['estado_id'] = 1;
        $respuestaIndicadore_4['RespuestaIndicadore']['user_created'] = $this->Authake->getUserId();
        $respuestaIndicadore_4['RespuestaIndicadore']['user_modified'] = $this->Authake->getUserId();

        if (!$this->RespuestaIndicadore->save($respuestaIndicadore_4)) {
            return false;
        }

        /*
         * Indicador 5: 2.4. Indicador de mantenimiento.
         * */
        $indicador_5 = $this->Indicadore->find('first', array(
            'conditions' => array('Indicadore.id' => '5', 'Indicadore.estado_id <>' => '2'),
            'recursive' => 0
        ));

        $alertas_5 = $this->Alerta->find('all', array(
            'conditions' => array('Alerta.indicadore_id' => '5', 'Alerta.estado_id <>' => '2'),
            'recursive' => 0
        ));

        // ¿En qué franja etaria se encuentra en promedio la flota (en años)?
        $respuestaPregunta_7 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '5', 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->RespuestaIndicadore->create();
        $respuestaIndicadore_5['RespuestaIndicadore']['consulta_id'] = $consulta_id;
        $respuestaIndicadore_5['RespuestaIndicadore']['indicadore_id'] = $indicador_5['Indicadore']['id'];
        $respuestaIndicadore_5['RespuestaIndicadore']['indicador'] = $indicador_5['Indicadore']['nombre'];
        $respuestaIndicadore_5['RespuestaIndicadore']['valor'] = (-0.0076 * pow($respuestaPregunta_7['RespuestaPregunta']['valor'] + 1, 2) + 0.0223 * ($respuestaPregunta_7['RespuestaPregunta']['valor'] + 1) + 0.9859);

        foreach ($alertas_5 as $alerta_5) {

            if($alerta_5['Alerta']['menor'] == '1'){

                if($respuestaIndicadore_5['RespuestaIndicadore']['valor'] <= $alerta_5['Alerta']['maximo']){
                    $respuestaIndicadore_5['RespuestaIndicadore']['alerta_id'] = $alerta_5['Alerta']['id'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['evento_id'] = $alerta_5['Alerta']['evento_id'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['alerta'] = $alerta_5['Alerta']['nombre'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['notificar'] = $alerta_5['Alerta']['notificar'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['mensaje'] = $alerta_5['Alerta']['mensaje'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['evento'] = $alerta_5['Evento']['nombre'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['color'] = $alerta_5['Evento']['color'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['menor'] = $alerta_5['Alerta']['menor'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['minimo'] = $alerta_5['Alerta']['minimo'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['maximo'] = $alerta_5['Alerta']['maximo'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['mayor'] = $alerta_5['Alerta']['mayor'];
                }

            } else if($alerta_5['Alerta']['mayor'] == '1'){

                if($respuestaIndicadore_4['RespuestaIndicadore']['valor'] >= $alerta_4['Alerta']['minimo']){
                    $respuestaIndicadore_5['RespuestaIndicadore']['alerta_id'] = $alerta_5['Alerta']['id'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['evento_id'] = $alerta_5['Alerta']['evento_id'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['alerta'] = $alerta_5['Alerta']['nombre'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['notificar'] = $alerta_5['Alerta']['notificar'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['mensaje'] = $alerta_5['Alerta']['mensaje'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['evento'] = $alerta_5['Evento']['nombre'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['color'] = $alerta_5['Evento']['color'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['menor'] = $alerta_5['Alerta']['menor'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['minimo'] = $alerta_5['Alerta']['minimo'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['maximo'] = $alerta_5['Alerta']['maximo'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['mayor'] = $alerta_5['Alerta']['mayor'];
                }

            } else{

                if(($respuestaIndicadore_5['RespuestaIndicadore']['valor'] <= $alerta_5['Alerta']['maximo']) && ($respuestaIndicadore_5['RespuestaIndicadore']['valor'] >= $alerta_5['Alerta']['minimo'])){
                    $respuestaIndicadore_5['RespuestaIndicadore']['alerta_id'] = $alerta_5['Alerta']['id'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['evento_id'] = $alerta_5['Alerta']['evento_id'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['alerta'] = $alerta_5['Alerta']['nombre'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['notificar'] = $alerta_5['Alerta']['notificar'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['mensaje'] = $alerta_5['Alerta']['mensaje'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['evento'] = $alerta_5['Evento']['nombre'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['color'] = $alerta_5['Evento']['color'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['menor'] = $alerta_5['Alerta']['menor'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['minimo'] = $alerta_5['Alerta']['minimo'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['maximo'] = $alerta_5['Alerta']['maximo'];
                    $respuestaIndicadore_5['RespuestaIndicadore']['mayor'] = $alerta_5['Alerta']['mayor'];
                }

            }
        }

        $respuestaIndicadore_5['RespuestaIndicadore']['unidade_id'] = $indicador_5['Unidade']['id'];
        $respuestaIndicadore_5['RespuestaIndicadore']['unidad'] = $indicador_5['Unidade']['nombre'];
        $respuestaIndicadore_5['RespuestaIndicadore']['estado_id'] = 1;
        $respuestaIndicadore_5['RespuestaIndicadore']['user_created'] = $this->Authake->getUserId();
        $respuestaIndicadore_5['RespuestaIndicadore']['user_modified'] = $this->Authake->getUserId();

        if (!$this->RespuestaIndicadore->save($respuestaIndicadore_5)) {
            return false;
        }

        /*
         * Indicador 6: 2.6. Indicador de gastos generales.
         * */
        $indicador_6 = $this->Indicadore->find('first', array(
            'conditions' => array('Indicadore.id' => '6', 'Indicadore.estado_id <>' => '2'),
            'recursive' => 0
        ));

        $alertas_6 = $this->Alerta->find('all', array(
            'conditions' => array('Alerta.indicadore_id' => '6', 'Alerta.estado_id <>' => '2'),
            'recursive' => 0
        ));

        // ¿Cuántas líneas brindan servicio en la ciudad de estudio? --> $respuestaPregunta_6
        // ¿Cuántas cabeceras de línea tiene la ciudad?
        $respuestaPregunta_8 = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '7', 'RespuestaPregunta.consulta_id' => $consulta_id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $this->RespuestaIndicadore->create();
        $respuestaIndicadore_6['RespuestaIndicadore']['consulta_id'] = $consulta_id;
        $respuestaIndicadore_6['RespuestaIndicadore']['indicadore_id'] = $indicador_6['Indicadore']['id'];
        $respuestaIndicadore_6['RespuestaIndicadore']['indicador'] = $indicador_6['Indicadore']['nombre'];
        $respuestaIndicadore_6['RespuestaIndicadore']['valor'] = $respuestaPregunta_6['RespuestaPregunta']['valor'] / $respuestaPregunta_8['RespuestaPregunta']['valor'];

        foreach ($alertas_6 as $alerta_6) {

            if($alerta_6['Alerta']['menor'] == '1'){

                if($respuestaIndicadore_6['RespuestaIndicadore']['valor'] <= $alerta_6['Alerta']['maximo']){
                    $respuestaIndicadore_6['RespuestaIndicadore']['alerta_id'] = $alerta_6['Alerta']['id'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['evento_id'] = $alerta_6['Alerta']['evento_id'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['alerta'] = $alerta_6['Alerta']['nombre'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['notificar'] = $alerta_6['Alerta']['notificar'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['mensaje'] = $alerta_6['Alerta']['mensaje'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['evento'] = $alerta_6['Evento']['nombre'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['color'] = $alerta_6['Evento']['color'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['menor'] = $alerta_6['Alerta']['menor'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['minimo'] = $alerta_6['Alerta']['minimo'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['maximo'] = $alerta_6['Alerta']['maximo'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['mayor'] = $alerta_6['Alerta']['mayor'];
                }

            } else if($alerta_6['Alerta']['mayor'] == '1'){

                if($respuestaIndicadore_6['RespuestaIndicadore']['valor'] >= $alerta_6['Alerta']['minimo']){
                    $respuestaIndicadore_6['RespuestaIndicadore']['alerta_id'] = $alerta_6['Alerta']['id'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['evento_id'] = $alerta_6['Alerta']['evento_id'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['alerta'] = $alerta_6['Alerta']['nombre'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['notificar'] = $alerta_6['Alerta']['notificar'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['mensaje'] = $alerta_6['Alerta']['mensaje'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['evento'] = $alerta_6['Evento']['nombre'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['color'] = $alerta_6['Evento']['color'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['menor'] = $alerta_6['Alerta']['menor'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['minimo'] = $alerta_6['Alerta']['minimo'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['maximo'] = $alerta_6['Alerta']['maximo'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['mayor'] = $alerta_6['Alerta']['mayor'];
                }

            } else{

                if(($respuestaIndicadore_6['RespuestaIndicadore']['valor'] <= $alerta_6['Alerta']['maximo']) && ($respuestaIndicadore_6['RespuestaIndicadore']['valor'] >= $alerta_6['Alerta']['minimo'])){
                    $respuestaIndicadore_6['RespuestaIndicadore']['alerta_id'] = $alerta_6['Alerta']['id'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['evento_id'] = $alerta_6['Alerta']['evento_id'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['alerta'] = $alerta_6['Alerta']['nombre'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['notificar'] = $alerta_6['Alerta']['notificar'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['mensaje'] = $alerta_6['Alerta']['mensaje'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['evento'] = $alerta_6['Evento']['nombre'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['color'] = $alerta_6['Evento']['color'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['menor'] = $alerta_6['Alerta']['menor'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['minimo'] = $alerta_6['Alerta']['minimo'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['maximo'] = $alerta_6['Alerta']['maximo'];
                    $respuestaIndicadore_6['RespuestaIndicadore']['mayor'] = $alerta_6['Alerta']['mayor'];;
                }

            }
        }

        $respuestaIndicadore_6['RespuestaIndicadore']['unidade_id'] = $indicador_6['Unidade']['id'];
        $respuestaIndicadore_6['RespuestaIndicadore']['unidad'] = $indicador_6['Unidade']['nombre'];
        $respuestaIndicadore_6['RespuestaIndicadore']['estado_id'] = 1;
        $respuestaIndicadore_6['RespuestaIndicadore']['user_created'] = $this->Authake->getUserId();
        $respuestaIndicadore_6['RespuestaIndicadore']['user_modified'] = $this->Authake->getUserId();

        if (!$this->RespuestaIndicadore->save($respuestaIndicadore_6)) {
            return false;
        }

        return (true);
    }

    public function resultado($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;
        $sube = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '23', 'RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        //$var = new Vars();
        //debug($var->isNumeric("123.11"));
        //debug($var->isNegative("matias"));

        $this->pdfConfig = array(
            'download' => true,
            'filename' => 'ResultadoConsulta_ID' . $id .'_'.date("Ymd").'-'.date("His"). '.pdf'
        );

        $this->set(compact('consulta', 'sube'));
    }

    public function enviar($id = null)
    {
        App::uses('CakeEmail', 'Network/Email');

        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;
        $sube = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '23', 'RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        $email = new CakeEmail();
        $email->config('gmail');
        $email->emailFormat('html');
        $email->template('informe', 'cetram');
        $email->from(array('cetram.utn.frsf@gmail.com' => 'CETRAM'));

        $to[$this->Authake->getUserEmail()] = $this->Authake->getUserEmail();

        $bcc['cetram.utn.frsf@gmail.com'] = 'cetram.utn.frsf@gmail.com';

        $bcc['linkinpark.sabalero22@gmail.com'] = 'linkinpark.sabalero22@gmail.com';

        //$bcc['rovere.matias@gmail.com'] = 'rovere.matias@gmail.com';

        $bcc['melisa.batistela@gmail.com'] = 'melisa.batistela@gmail.com';

        $bcc['dag-92@hotmail.com'] = 'dag-92@hotmail.com';

        $email->to($to);

        //$email->cc($cc);

        $email->bcc($bcc);

        $email->viewVars(array('consulta' => $consulta, 'sube' => $sube));

        $email->subject('Informe de Resultados CETRAM - ' . date("Y") . '-' . date("m") . '-' . date("d") . ' - ' . $id);

        //$email->helpers(array('InlineCss'));

        $email->helpers(array('Authake.Authake'));

        if(!$email->send()) {
            $result = $email->ErrorInfo;
        }
        else
        {
            $result = "El informe fue enviado correctamente.";
        }


        // $this->set(compact('consulta', 'sube'));

        $this->Session->setFlash(__($result));
        return $this->redirect(array('controller' => 'consultas', 'action' => 'resultado', $id));

    }

    public function informe()
    {
        $this->Consulta->recursive = 0;
        $this->paginate = array(
//            'limit' => 5,
            'fields' => array('Consulta.*', 'Estado.nombre', 'Modo.nombre','Localidade.nombre', 'Localidade.codigopostal'),
            'order' => array('id' => 'desc')
        );
        $this->set('consultas', $this->Paginator->paginate());
    }

    public function configuracion()
    {
        $this->Consulta->recursive = -1;
    }

    public function respuestas()
    {
        $this->Consulta->recursive = -1;
    }

    public function copiar($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);


        if (!$this->Session->read('Grupo.Admin') || !$this->Session->read('Grupo.Sistemas')){
            if($consulta['Consulta']['user_created'] != $this->Authake->getUserId()){
                $this->Session->setFlash(__('No se permite copiar esta consulta.'));
                return $this->redirect(array('action' => 'index'));
            }
        }


        $this->Consulta->create();

        $nueva['Consulta']['costo'] = 0;
        $nueva['Consulta']['costo_minimo'] = 0;
        $nueva['Consulta']['costo_maximo'] = 0;
        $nueva['Consulta']['costo_inferior'] = 0;
        $nueva['Consulta']['costo_superior'] = 0;
        $nueva['Consulta']['tarifa'] = 0;
        $nueva['Consulta']['tarifa_minima'] = 0;
        $nueva['Consulta']['tarifa_maxima'] = 0;
        $nueva['Consulta']['tarifa_inferior'] = 0;
        $nueva['Consulta']['tarifa_superior'] = 0;
        $nueva['Consulta']['subsidio'] = 0;
        $nueva['Consulta']['subsidio_minimo'] = 0;
        $nueva['Consulta']['subsidio_maximo'] = 0;
        $nueva['Consulta']['subsidio_inferior'] = 0;
        $nueva['Consulta']['subsidio_superior'] = 0;
        $nueva['Consulta']['ipk'] = 0;
        $nueva['Consulta']['subsidio_pax'] = 0;
        $nueva['Consulta']['unidade_id'] = 8; // Pesos ($)
        $nueva['Consulta']['localidade_id'] = $this->Authake->getLocalidadId();
        $nueva['Consulta']['modo_id'] = 7; // Nueva Consulta.
        $nueva['Consulta']['estado_id'] = 1; // Activo
        $nueva['Consulta']['user_created'] = $this->Authake->getUserId();
        $nueva['Consulta']['user_modified'] = $this->Authake->getUserId();

        if ($this->Consulta->save($nueva)) {

            $nueva['Consulta']['id'] = $this->Consulta->id;

            $this->loadModel('Agrupamiento');
            $this->Agrupamiento->recursive = -1;
            $this->loadModel('Paso');
            $this->Paso->recursive = -1;
            $agrupamientos = $this->Agrupamiento->find('all', array(
                'conditions' => array('Agrupamiento.orden <>' => '0', 'Agrupamiento.estado_id <>' => '2'),
                'recursive' => -1,
                'order' => array('Agrupamiento.orden' => 'asc')
            ));

            foreach ($agrupamientos as $agrupamiento) {
                $paso = NULL;
                $this->Paso->create();
                $paso['Paso']['consulta_id'] = $nueva['Consulta']['id'];
                $paso['Paso']['agrupamiento_id'] = $agrupamiento['Agrupamiento']['id'];
                if($agrupamiento['Agrupamiento']['id'] == '7'){
                    $paso['Paso']['completo'] = 0; // Incompleto
                }
                else{
                    $paso['Paso']['completo'] = 1; // Completo
                }
                $paso['Paso']['estado_id'] = 1; // Activo
                $paso['Paso']['user_created'] = $this->Authake->getUserId();
                $paso['Paso']['user_modified'] = $this->Authake->getUserId();
                $this->Paso->save($paso);
            }

            $this->loadModel('RespuestaCoeficiente');
            $this->RespuestaCoeficiente->recursive = -1;
            $coeficientes = $this->RespuestaCoeficiente->find('all', array(
                'conditions' => array('RespuestaCoeficiente.consulta_id' => $id),
                'recursive' => -1
            ));
            foreach ($coeficientes as $coeficiente) {
                $this->RespuestaCoeficiente->create();
                unset($coeficiente['RespuestaCoeficiente']['id']);
                $coeficiente['RespuestaCoeficiente']['consulta_id'] = $nueva['Consulta']['id'];
                $coeficiente['RespuestaCoeficiente']['user_created'] = $this->Authake->getUserId();
                $coeficiente['RespuestaCoeficiente']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaCoeficiente->save($coeficiente)) {
                    $this->Session->setFlash(__('The Consulta could not be saved. Please, try again.'));
                    return $this->redirect(array('action' => 'eliminar', $nueva['Consulta']['id']));
                } else {
                    $this->Session->setFlash(__('The RespuestaCoeficiente has been saved.'));
                }
            }

            $this->loadModel('RespuestaParametro');
            $this->RespuestaParametro->recursive = -1;
            $parametros = $this->RespuestaParametro->find('all', array(
                'conditions' => array('RespuestaParametro.consulta_id' => $id),
                'recursive' => -1
            ));
            foreach ($parametros as $parametro) {
                $this->RespuestaParametro->create();
                unset($parametro['RespuestaParametro']['id']);
                $parametro['RespuestaParametro']['consulta_id'] = $nueva['Consulta']['id'];
                $parametro['RespuestaParametro']['user_created'] = $this->Authake->getUserId();
                $parametro['RespuestaParametro']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaParametro->save($parametro)) {
                    $this->Session->setFlash(__('The Consulta could not be saved. Please, try again.'));
                    return $this->redirect(array('action' => 'eliminar', $nueva['Consulta']['id']));
                } else {
                    $this->Session->setFlash(__('The RespuestaParametro has been saved.'));
                }
            }

            $this->loadModel('RespuestaPasajero');
            $this->RespuestaPasajero->recursive = -1;
            $pasajeros = $this->RespuestaPasajero->find('all', array(
                'conditions' => array('RespuestaPasajero.consulta_id' => $id),
                'recursive' => -1
            ));
            foreach ($pasajeros as $pasajero) {
                $this->RespuestaPasajero->create();
                unset($pasajero['RespuestaPasajero']['id']);
                $pasajero['RespuestaPasajero']['consulta_id'] = $nueva['Consulta']['id'];
                $pasajero['RespuestaPasajero']['user_created'] = $this->Authake->getUserId();
                $pasajero['RespuestaPasajero']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaPasajero->save($pasajero)) {
                    $this->Session->setFlash(__('The Consulta could not be saved. Please, try again.'));
                    return $this->redirect(array('action' => 'eliminar', $nueva['Consulta']['id']));
                } else {
                    $this->Session->setFlash(__('The RespuestaPasajero has been saved.'));
                }
            }

            $this->loadModel('RespuestaPregunta');
            $this->RespuestaPregunta->recursive = -1;
            $preguntas = $this->RespuestaPregunta->find('all', array(
                'conditions' => array('RespuestaPregunta.consulta_id' => $id),
                'recursive' => -1
            ));
            foreach ($preguntas as $pregunta) {
                $this->RespuestaPregunta->create();
                unset($pregunta['RespuestaPregunta']['id']);
                $pregunta['RespuestaPregunta']['consulta_id'] = $nueva['Consulta']['id'];
                $pregunta['RespuestaPregunta']['user_created'] = $this->Authake->getUserId();
                $pregunta['RespuestaPregunta']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaPregunta->save($pregunta)) {
                    $this->Session->setFlash(__('The Consulta could not be saved. Please, try again.'));
                    return $this->redirect(array('action' => 'eliminar', $nueva['Consulta']['id']));
                } else {
                    $this->Session->setFlash(__('The RespuestaPregunta has been saved.'));
                }
            }

            $this->loadModel('RespuestaSalario');
            $this->RespuestaSalario->recursive = -1;
            $salarios = $this->RespuestaSalario->find('all', array(
                'conditions' => array('RespuestaSalario.consulta_id' => $id),
                'recursive' => -1
            ));
            foreach ($salarios as $salario) {
                $this->RespuestaSalario->create();
                unset($salario['RespuestaSalario']['id']);
                $salario['RespuestaSalario']['consulta_id'] = $nueva['Consulta']['id'];
                $salario['RespuestaSalario']['user_created'] = $this->Authake->getUserId();
                $salario['RespuestaSalario']['user_modified'] = $this->Authake->getUserId();
                if (!$this->RespuestaSalario->save($salario)) {
                    $this->Session->setFlash(__('The Consulta could not be saved. Please, try again.'));
                    return $this->redirect(array('action' => 'eliminar', $nueva['Consulta']['id']));
                } else {
                    $this->Session->setFlash(__('The RespuestaSalario has been saved.'));
                }
            }

            $this->Session->setFlash(__('La Consulta fue copiada correctamente.'));
            return $this->redirect(array('action' => 'continuar', $nueva['Consulta']['id']));
        }

        else{
            $this->Session->setFlash(__('The consulta could not be saved. Please, try again.'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * @param $search
     * @return CakeResponse|null
     */
    public function search_by_localidad($search) {
        $this->loadModel('Localidade');
        $this->Localidade->recursive = 0;
        $localidades = $this->Localidade->find('all', array(
            'recursive' => 0,
            'order' => array('Localidade.nombre' => 'asc', 'Localidade.codigopostal' => 'asc'),
            //'fields' => array('id AS id, concat(nombre," (",codigopostal,")") as nombre'),
            'fields' => array('Localidade.id' ,'Localidade.nombre' ,'Localidade.codigopostal', 'Provincia.nombre'),
            'conditions' => array('Localidade.nombre <>' => '', 'Localidade.estado_id' => '1', 'Localidade.nombre LIKE' => "%{$search}%"),
            'limit' => 100
        ));

        $result = array();
        foreach ($localidades as $localidad) {
            $result[] = array(
                'value' => $localidad['Localidade']['id'],
                'text' => $localidad['Localidade']['nombre']." (CP: ".$localidad['Localidade']['codigopostal']." - Prov.: ".$localidad['Provincia']['nombre'].")"
            );
        }

        $this->response->type('json');
        $this->response->body(json_encode($result));

        return $this->response;
    }


    public function csvpreguntas($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = 0;
        $data = $this->RespuestaPregunta->find('all', array(
            'conditions' => array('Consulta.id' => $id, 'Estado.id' => '1'),
            'Consulta.id' => 'asc', 'RespuestaPregunta.id' => 'asc'
        ));

        $_delimiter = ';';
        $_bom = true;
        $_null = '';
        $_serialize = 'data';

        $_extract = array(
            'RespuestaPregunta.pregunta',
            'RespuestaPregunta.respuesta',
            'RespuestaPregunta.unidad'
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


    public function csvpasajeros($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $this->loadModel('RespuestaPasajero');
        $this->RespuestaPasajero->recursive = 0;
        $data = $this->RespuestaPasajero->find('all', array(
            'conditions' => array('Consulta.id' => $id, 'Estado.id' => '1'),
            'Consulta.id' => 'asc', 'RespuestaPasajero.id' => 'asc'
        ));

        foreach ($data as $key => $rp) {
            if(!empty($rp['RespuestaPasajero']['costo'])){$data[$key]['RespuestaPasajero']['costo'] = number_format ( $rp['RespuestaPasajero']['costo'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['semestre1'])){$data[$key]['RespuestaPasajero']['semestre1'] = number_format ( $rp['RespuestaPasajero']['semestre1'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['semestre2'])){$data[$key]['RespuestaPasajero']['semestre2'] = number_format ( $rp['RespuestaPasajero']['semestre2'], '2', ',', '.');}

            if(!empty($rp['RespuestaPasajero']['mes01'])){$data[$key]['RespuestaPasajero']['mes01'] = number_format ( $rp['RespuestaPasajero']['mes01'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes02'])){$data[$key]['RespuestaPasajero']['mes02'] = number_format ( $rp['RespuestaPasajero']['mes02'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes03'])){$data[$key]['RespuestaPasajero']['mes03'] = number_format ( $rp['RespuestaPasajero']['mes03'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes04'])){$data[$key]['RespuestaPasajero']['mes04'] = number_format ( $rp['RespuestaPasajero']['mes04'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes05'])){$data[$key]['RespuestaPasajero']['mes05'] = number_format ( $rp['RespuestaPasajero']['mes05'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes06'])){$data[$key]['RespuestaPasajero']['mes06'] = number_format ( $rp['RespuestaPasajero']['mes06'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes07'])){$data[$key]['RespuestaPasajero']['mes07'] = number_format ( $rp['RespuestaPasajero']['mes07'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes08'])){$data[$key]['RespuestaPasajero']['mes08'] = number_format ( $rp['RespuestaPasajero']['mes08'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes09'])){$data[$key]['RespuestaPasajero']['mes09'] = number_format ( $rp['RespuestaPasajero']['mes09'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes10'])){$data[$key]['RespuestaPasajero']['mes10'] = number_format ( $rp['RespuestaPasajero']['mes10'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes11'])){$data[$key]['RespuestaPasajero']['mes11'] = number_format ( $rp['RespuestaPasajero']['mes11'], '2', ',', '.');}
            if(!empty($rp['RespuestaPasajero']['mes12'])){$data[$key]['RespuestaPasajero']['mes12'] = number_format ( $rp['RespuestaPasajero']['mes12'], '2', ',', '.');}

            if($rp['RespuestaPasajero']['sube']=='1'){$data[$key]['RespuestaPasajero']['sube']='SI';} else{$data[$key]['RespuestaPasajero']['sube']='NO';}
            if($rp['RespuestaPasajero']['base']=='1'){$data[$key]['RespuestaPasajero']['base']='SI';} else{$data[$key]['RespuestaPasajero']['base']='NO';}
        }

        $_delimiter = ';';
        $_bom = true;
        $_null = '';
        $_serialize = 'data';

        $_extract = array(
            'RespuestaPasajero.tarifa',
            'RespuestaPasajero.sube',
            'RespuestaPasajero.base',
            'RespuestaPasajero.costo',
            'RespuestaPasajero.semestre1',
            'RespuestaPasajero.semestre2',
            'RespuestaPasajero.mes01',
            'RespuestaPasajero.mes02',
            'RespuestaPasajero.mes03',
            'RespuestaPasajero.mes04',
            'RespuestaPasajero.mes05',
            'RespuestaPasajero.mes06',
            'RespuestaPasajero.mes07',
            'RespuestaPasajero.mes08',
            'RespuestaPasajero.mes09',
            'RespuestaPasajero.mes10',
            'RespuestaPasajero.mes11',
            'RespuestaPasajero.mes12'
        );

        $excludePaths = array(); // Exclude all id fields
        //$_extract = $this->CsvView->prepareExtractFromFindResults($data, $excludePaths);

        $customHeaders = array();
        $options = array('includeClassname' => false, 'humanReadable' => true);
        $_header = $this->CsvView->prepareHeaderFromExtract($_extract, $customHeaders, $options);

        $this->response->download('RespuestaPasajeros_'.date("Ymd").'-'.date("His").'.csv'); // <= setting the file name

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


    public function csvsalarios($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $this->loadModel('RespuestaSalario');
        $this->RespuestaSalario->recursive = 0;
        $data = $this->RespuestaSalario->find('all', array(
            'conditions' => array('Consulta.id' => $id, 'Estado.id' => '1'),
            'Consulta.id' => 'asc', 'RespuestaSalario.id' => 'asc'
        ));

        foreach ($data as $key => $rp) {
            if(!empty($rp['RespuestaSalario']['salario'])){$data[$key]['RespuestaSalario']['salario'] = number_format ( $rp['RespuestaSalario']['salario'], '2', ',', '.');}
            if(!empty($rp['RespuestaSalario']['cantidad'])){$data[$key]['RespuestaSalario']['cantidad'] = number_format ( $rp['RespuestaSalario']['cantidad'], '2', ',', '.');}
            if(!empty($rp['RespuestaSalario']['antiguedad'])){$data[$key]['RespuestaSalario']['antiguedad'] = number_format ( $rp['RespuestaSalario']['antiguedad'], '2', ',', '.');}
        }

        $_delimiter = ';';
        $_bom = true;
        $_null = '';
        $_serialize = 'data';

        $_extract = array(
            'RespuestaSalario.categoria',
            'RespuestaSalario.salario',
            'RespuestaSalario.cantidad',
            'RespuestaSalario.antiguedad'
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


    public function csvparametros($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $this->loadModel('RespuestaParametro');
        $this->RespuestaParametro->recursive = 0;
        $data = $this->RespuestaParametro->find('all', array(
            'conditions' => array('Consulta.id' => $id, 'Estado.id' => '1'),
            'Consulta.id' => 'asc', 'RespuestaParametro.id' => 'asc'
        ));

        foreach ($data as $key => $rp) {
            if(!empty($rp['RespuestaParametro']['valor'])){$data[$key]['RespuestaParametro']['valor'] = number_format ( $rp['RespuestaParametro']['valor'], '2', ',', '.');}
            if($rp['RespuestaParametro']['editado']=='1'){$data[$key]['RespuestaParametro']['editado']='SI';} else{$data[$key]['RespuestaParametro']['editado']='NO';}
        }

        $_delimiter = ';';
        $_bom = true;
        $_null = '';
        $_serialize = 'data';

        $_extract = array(
            'RespuestaParametro.parametro',
            'RespuestaParametro.valor',
            'RespuestaParametro.unidad',
            'RespuestaParametro.editado'
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


    public function csvcoeficientes($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $this->loadModel('RespuestaCoeficiente');
        $this->RespuestaCoeficiente->recursive = 0;
        $data = $this->RespuestaCoeficiente->find('all', array(
            'conditions' => array('Consulta.id' => $id, 'Estado.id' => '1'),
            'Consulta.id' => 'asc', 'RespuestaCoeficiente.id' => 'asc'
        ));

        foreach ($data as $key => $rp) {
            if(!empty($rp['RespuestaCoeficiente']['valor'])){$data[$key]['RespuestaCoeficiente']['valor'] = number_format ( $rp['RespuestaCoeficiente']['valor'], '2', ',', '.');}
            if(!empty($rp['RespuestaCoeficiente']['minimo'])){$data[$key]['RespuestaCoeficiente']['minimo'] = number_format ( $rp['RespuestaCoeficiente']['minimo'], '2', ',', '.');}
            if(!empty($rp['RespuestaCoeficiente']['maximo'])){$data[$key]['RespuestaCoeficiente']['maximo'] = number_format ( $rp['RespuestaCoeficiente']['maximo'], '2', ',', '.');}
        }

        $_delimiter = ';';
        $_bom = true;
        $_null = '';
        $_serialize = 'data';

        $_extract = array(
            'RespuestaCoeficiente.coeficiente',
            'RespuestaCoeficiente.minimo',
            'RespuestaCoeficiente.valor',
            'RespuestaCoeficiente.maximo'
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


    public function csvindicadores($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $this->loadModel('RespuestaIndicadore');
        $this->RespuestaIndicadore->recursive = 0;
        $data = $this->RespuestaIndicadore->find('all', array(
            'conditions' => array('Consulta.id' => $id, 'Estado.id' => '1'),
            'Consulta.id' => 'asc', 'RespuestaIndicadore.id' => 'asc'
        ));

        foreach ($data as $key => $rp) {
            if(!empty($rp['RespuestaIndicadore']['valor'])){$data[$key]['RespuestaIndicadore']['valor'] = number_format ( $rp['RespuestaIndicadore']['valor'], '2', ',', '.');}
            if(!empty($rp['RespuestaIndicadore']['minimo'])){$data[$key]['RespuestaIndicadore']['minimo'] = number_format ( $rp['RespuestaIndicadore']['minimo'], '2', ',', '.');}
            if(!empty($rp['RespuestaIndicadore']['maximo'])){$data[$key]['RespuestaIndicadore']['maximo'] = number_format ( $rp['RespuestaIndicadore']['maximo'], '2', ',', '.');}
            if($rp['RespuestaIndicadore']['notificar']=='1'){$data[$key]['RespuestaIndicadore']['notificar']='SI';} else{$data[$key]['RespuestaIndicadore']['notificar']='NO';}
        }

        $_delimiter = ';';
        $_bom = true;
        $_null = '';
        $_serialize = 'data';

        $_extract = array(
            'RespuestaIndicadore.indicador',
            'RespuestaIndicadore.valor',
            'RespuestaIndicadore.alerta',
            'RespuestaIndicadore.mensaje',
            'RespuestaIndicadore.evento',
            'RespuestaIndicadore.minimo',
            'RespuestaIndicadore.maximo',
            'RespuestaIndicadore.unidad',
            'RespuestaIndicadore.notificar',
            'RespuestaIndicadore.color'
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


    public function csvitems($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $this->loadModel('RespuestaItem');
        $this->RespuestaItem->recursive = 0;
        $data = $this->RespuestaItem->find('all', array(
            'conditions' => array('Consulta.id' => $id, 'Estado.id' => '1'),
            'Consulta.id' => 'asc', 'RespuestaItem.id' => 'asc'
        ));

        foreach ($data as $key => $rp) {
            if(!empty($rp['RespuestaItem']['valor'])){$data[$key]['RespuestaItem']['valor'] = number_format ( $rp['RespuestaItem']['valor'], '2', ',', '.');}
            if(!empty($rp['RespuestaItem']['incidencia_valor'])){$data[$key]['RespuestaItem']['incidencia_valor'] = number_format ( $rp['RespuestaItem']['incidencia_valor'], '2', ',', '.');}
            if(!empty($rp['RespuestaItem']['minimo'])){$data[$key]['RespuestaItem']['minimo'] = number_format ( $rp['RespuestaItem']['minimo'], '2', ',', '.');}
            if(!empty($rp['RespuestaItem']['incidencia_minimo'])){$data[$key]['RespuestaItem']['incidencia_minimo'] = number_format ( $rp['RespuestaItem']['incidencia_minimo'], '2', ',', '.');}
            if(!empty($rp['RespuestaItem']['maximo'])){$data[$key]['RespuestaItem']['maximo'] = number_format ( $rp['RespuestaItem']['maximo'], '2', ',', '.');}
            if(!empty($rp['RespuestaItem']['incidencia_maximo'])){$data[$key]['RespuestaItem']['incidencia_maximo'] = number_format ( $rp['RespuestaItem']['incidencia_maximo'], '2', ',', '.');}
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
            'RespuestaItem.incidencia_maximo'
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


    public function csvtipos($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $this->loadModel('RespuestaTipo');
        $this->RespuestaTipo->recursive = 0;
        $data = $this->RespuestaTipo->find('all', array(
            'conditions' => array('Consulta.id' => $id, 'Estado.id' => '1'),
            'Consulta.id' => 'asc', 'RespuestaTipo.id' => 'asc'
        ));

        foreach ($data as $key => $rp) {
            if(!empty($rp['RespuestaTipo']['valor'])){$data[$key]['RespuestaTipo']['valor'] = number_format ( $rp['RespuestaTipo']['valor'], '2', ',', '.');}
            if(!empty($rp['RespuestaTipo']['incidencia_valor'])){$data[$key]['RespuestaTipo']['incidencia_valor'] = number_format ( $rp['RespuestaTipo']['incidencia_valor'], '2', ',', '.');}
            if(!empty($rp['RespuestaTipo']['minimo'])){$data[$key]['RespuestaTipo']['minimo'] = number_format ( $rp['RespuestaTipo']['minimo'], '2', ',', '.');}
            if(!empty($rp['RespuestaTipo']['incidencia_minimo'])){$data[$key]['RespuestaTipo']['incidencia_minimo'] = number_format ( $rp['RespuestaTipo']['incidencia_minimo'], '2', ',', '.');}
            if(!empty($rp['RespuestaTipo']['maximo'])){$data[$key]['RespuestaTipo']['maximo'] = number_format ( $rp['RespuestaTipo']['maximo'], '2', ',', '.');}
            if(!empty($rp['RespuestaTipo']['incidencia_maximo'])){$data[$key]['RespuestaTipo']['incidencia_maximo'] = number_format ( $rp['RespuestaTipo']['incidencia_maximo'], '2', ',', '.');}
            if(!empty($rp['RespuestaTipo']['superior'])){$data[$key]['RespuestaTipo']['superior'] = number_format ( $rp['RespuestaTipo']['superior'], '2', ',', '.');}
            if(!empty($rp['RespuestaTipo']['incidencia_superior'])){$data[$key]['RespuestaTipo']['incidencia_superior'] = number_format ( $rp['RespuestaTipo']['incidencia_superior'], '2', ',', '.');}
            if(!empty($rp['RespuestaTipo']['inferior'])){$data[$key]['RespuestaTipo']['inferior'] = number_format ( $rp['RespuestaItem']['inferior'], '2', ',', '.');}
            if(!empty($rp['RespuestaTipo']['incidencia_inferior'])){$data[$key]['RespuestaTipo']['incidencia_superior'] = number_format ( $rp['RespuestaTipo']['incidencia_inferior'], '2', ',', '.');}
        }

        $_delimiter = ';';
        $_bom = true;
        $_null = '';
        $_serialize = 'data';

        $_extract = array(
            'RespuestaTipo.tipo',
            'RespuestaTipo.unidad',
            'RespuestaTipo.minimo',
            'RespuestaTipo.incidencia_minimo',
            'RespuestaTipo.inferior',
            'RespuestaTipo.incidencia_inferior',
            'RespuestaTipo.valor',
            'RespuestaTipo.incidencia_valor',
            'RespuestaTipo.superior',
            'RespuestaTipo.incidencia_superior',
            'RespuestaTipo.maximo',
            'RespuestaTipo.incidencia_maximo'
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


    public function csvresumen($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }
        $this->Consulta->recursive = -1;
        $consulta = $this->Consulta->find('first', array(
            'conditions' => array('Consulta.id' => $id)
        ));

        $resumen['0']['Resumen']['Resultado'] = 'Costo (por kilometro)';
        $resumen['0']['Resumen']['Inferior'] = number_format($consulta['Consulta']['costo_inferior'], 3, ',', '.');
        $resumen['0']['Resumen']['Minimo'] = number_format($consulta['Consulta']['costo_minimo'], 3, ',', '.');
        $resumen['0']['Resumen']['Estimado'] = number_format($consulta['Consulta']['costo'], 3, ',', '.');
        $resumen['0']['Resumen']['Maximo'] = number_format($consulta['Consulta']['costo_maximo'], 3, ',', '.');
        $resumen['0']['Resumen']['Superior'] = number_format($consulta['Consulta']['costo_superior'], 3, ',', '.');

        $resumen['1']['Resumen']['Resultado'] = 'Tarifa de Equilibrio (sin subsidios)';
        $resumen['1']['Resumen']['Inferior'] = number_format($consulta['Consulta']['tarifa_inferior'], 3, ',', '.');
        $resumen['1']['Resumen']['Minimo'] = number_format($consulta['Consulta']['tarifa_minima'], 3, ',', '.');
        $resumen['1']['Resumen']['Estimado'] = number_format($consulta['Consulta']['tarifa'], 3, ',', '.');
        $resumen['1']['Resumen']['Maximo'] = number_format($consulta['Consulta']['tarifa_maxima'], 3, ',', '.');
        $resumen['1']['Resumen']['Superior'] = number_format($consulta['Consulta']['tarifa_superior'], 3, ',', '.');

        $resumen['2']['Resumen']['Resultado'] = 'Tarifa de Equilibrio (con subsidios)';
        $resumen['2']['Resumen']['Inferior'] = number_format($consulta['Consulta']['subsidio_inferior'], 3, ',', '.');
        $resumen['2']['Resumen']['Minimo'] = number_format($consulta['Consulta']['subsidio_minimo'], 3, ',', '.');
        $resumen['2']['Resumen']['Estimado'] = number_format($consulta['Consulta']['subsidio'], 3, ',', '.');
        $resumen['2']['Resumen']['Maximo'] = number_format($consulta['Consulta']['subsidio_maximo'], 3, ',', '.');
        $resumen['2']['Resumen']['Superior'] = number_format($consulta['Consulta']['subsidio_superior'], 3, ',', '.');

        $_delimiter = ';';
        $_bom = true;
        $_null = '';
        $_serialize = 'resumen';

        $_extract = array(
            'Resumen.Resultado',
            'Resumen.Inferior',
            'Resumen.Minimo',
            'Resumen.Estimado',
            'Resumen.Maximo',
            'Resumen.Superior'
        );

        $excludePaths = array(); // Exclude all id fields
        //$_extract = $this->CsvView->prepareExtractFromFindResults($data, $excludePaths);

        $customHeaders = array();
        $options = array('includeClassname' => false, 'humanReadable' => true);
        $_header = $this->CsvView->prepareHeaderFromExtract($_extract, $customHeaders, $options);

        $this->response->download('Resumen_'.date("Ymd").'-'.date("His").'.csv'); // <= setting the file name

        $this->viewClass = 'CsvView.Csv';
        $this->set(compact(
            'resumen',
            '_serialize',
            '_header',
            '_extract',
            '_delimiter',
            '_bom',
            '_null'
        ));
    }


    public function resultadopdf($id = null)
    {
        if (!$this->Consulta->exists($id)) {
            throw new NotFoundException(__('Invalid consulta'));
        }

        $options = array('conditions' => array('Consulta.' . $this->Consulta->primaryKey => $id));
        $consulta = $this->Consulta->find('first', $options);

        $this->loadModel('RespuestaPregunta');
        $this->RespuestaPregunta->recursive = -1;
        $sube = $this->RespuestaPregunta->find('first', array(
            'conditions' => array('RespuestaPregunta.pregunta_id' => '23', 'RespuestaPregunta.consulta_id' => $id, 'RespuestaPregunta.estado_id <>' => '2'),
            'recursive' => -1
        ));

        //$var = new Vars();
        //debug($var->isNumeric("123.11"));
        //debug($var->isNegative("matias"));

        $this->pdfConfig = array(
            'download' => true,
            'filename' => 'ResultadoConsulta_' . $id .'.pdf'
        );

        $this->set(compact('consulta', 'sube'));
    }




}
