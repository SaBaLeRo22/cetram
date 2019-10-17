<?php
App::uses('AppController', 'Controller');

/**
 * RespuestaPasajeros Controller
 *
 * @property RespuestaPasajero $RespuestaPasajero
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RespuestaPasajerosController extends AppController
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
        $this->RespuestaPasajero->recursive = 0;
        $this->paginate = array(
            'limit' => '5',
            'order' => array(
                'Consulta.id' => 'asc', 'RespuestaPasajero.id' => 'asc'
            )
        );
        $this->set('respuestaPasajeros', $this->Paginator->paginate());
    }

    public function csv()
    {
        $this->RespuestaPasajero->recursive = 0;
        $data = $this->RespuestaPasajero->find('all', array(
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
            $data[$key]['RespuestaPasajero']['estado'] = $rp['Estado']['nombre'];
            $data[$key]['RespuestaPasajero']['user_created'] = $this->Authake->getUsuario($rp['RespuestaPasajero']['user_created']);
            $data[$key]['RespuestaPasajero']['user_modified'] = $this->Authake->getUsuario($rp['RespuestaPasajero']['user_modified']);
        }

        $_delimiter = ';';
        $_bom = true;
        $_null = '';
        $_serialize = 'data';

        $_extract = array(
            'RespuestaPasajero.id',
            'RespuestaPasajero.consulta_id',
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
            'RespuestaPasajero.mes12',
            'RespuestaPasajero.estado',
            'RespuestaPasajero.created',
            'RespuestaPasajero.modified',
            'RespuestaPasajero.user_created',
            'RespuestaPasajero.user_modified'
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

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->RespuestaPasajero->exists($id)) {
            throw new NotFoundException(__('No existe respuesta asociada.'));
        }
        $options = array('conditions' => array('RespuestaPasajero.' . $this->RespuestaPasajero->primaryKey => $id));
        $this->set('respuestaPasajero', $this->RespuestaPasajero->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->RespuestaPasajero->create();
            if ($this->RespuestaPasajero->save($this->request->data)) {
                $this->Session->setFlash(__('La respuesta fue registrada.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La respuesta no se pudo registrar.'));
            }
        }
        $consultas = $this->RespuestaPasajero->Consultum->find('list');
        $estados = $this->RespuestaPasajero->Estado->find('list');
        $this->set(compact('consultas', 'estados'));
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
        if (!$this->RespuestaPasajero->exists($id)) {
            throw new NotFoundException(__('No existe respuesta asociada.'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->RespuestaPasajero->save($this->request->data)) {
                $this->Session->setFlash(__('La respuesta fue editada.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('La respuesta no se pudo editar.'));
            }
        } else {
            $options = array('conditions' => array('RespuestaPasajero.' . $this->RespuestaPasajero->primaryKey => $id));
            $this->request->data = $this->RespuestaPasajero->find('first', $options);
        }
        $consultas = $this->RespuestaPasajero->Consultum->find('list');
        $estados = $this->RespuestaPasajero->Estado->find('list');
        $this->set(compact('consultas', 'estados'));
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
        $this->RespuestaPasajero->id = $id;
        if (!$this->RespuestaPasajero->exists()) {
            throw new NotFoundException(__('No existe respuesta asociada.'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->RespuestaPasajero->delete()) {
            $this->Session->setFlash(__('La respuesta fue eliminada.'));
        } else {
            $this->Session->setFlash(__('La respuesta no se pudo eliminar.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * eliminar method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function eliminar($id = null)
    {
        $this->RespuestaPasajero->id = $id;
        if (!$this->RespuestaPasajero->exists()) {
            throw new NotFoundException(__('No existe respuesta asociada.'));
        }

        $options = array('conditions' => array('RespuestaPasajero.' . $this->RespuestaPasajero->primaryKey => $id));
        $respuestaPasajero = $this->RespuestaPasajero->find('first', $options);

//        $this->request->allowMethod('post', 'delete');
        if ($this->RespuestaPasajero->delete()) {

            /***ACTUALIZO LA BASE***/
            $base = $this->RespuestaPasajero->find('first', array(
                'conditions' => array('RespuestaPasajero.consulta_id' => $respuestaPasajero['RespuestaPasajero']['consulta_id'], 'RespuestaPasajero.sube' => $respuestaPasajero['RespuestaPasajero']['sube'], 'RespuestaPasajero.base <>' => '0', 'RespuestaPasajero.estado_id <>' => '2'),
                'recursive' => -1
            ));
            if (empty($base)) {
                $pasajero = $this->RespuestaPasajero->find('first', array(
                    'conditions' => array('RespuestaPasajero.consulta_id' => $respuestaPasajero['RespuestaPasajero']['consulta_id'], 'RespuestaPasajero.sube' => $respuestaPasajero['RespuestaPasajero']['sube'], 'RespuestaPasajero.estado_id <>' => '2'),
                    'order' => array('RespuestaPasajero.id' => 'asc'),
                    'recursive' => -1
                ));
                if (!empty($pasajero)) {
                    $pasajero['RespuestaPasajero']['base'] = '1';
                    if (!$this->RespuestaPasajero->save($pasajero)) {
                        $this->Session->setFlash(__('Problemas al actualizar la Base.'));
                    }
                }
            }
            /*****/

            $this->Session->setFlash(__('Tarifa eliminada correctamente.'));
        } else {
            $this->Session->setFlash(__('Tarifa no se pudo eliminar. Por favor, intente nuevamente.'));
        }
        return $this->redirect(array('controller' => 'consultas', 'action' => 'tres', $respuestaPasajero['RespuestaPasajero']['consulta_id']));
    }
}
