<?php 
/**
 * @var $this View
 */
?>
<div class="row consultas form">
    <div class="col-md-12">
        <h1>Realizar Consulta
            <small>Paso 6 de 6</small>
        </h1>

        <h2>
            <small>Resumen:</small>
        </h2>


        <ul>
            <li>
                <p class="text-success"><strong>Paso 1:</strong><span class="badge badge-success" style="background-color:#468847"> Ok <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span></p>
            </li>
            <li>
                <p class="text-success"><strong>Paso 2:</strong><span class="badge badge-success" style="background-color:#468847"> Ok <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span></p>
            </li>
            <li>
                <p class="text-success"><strong>Paso 3:</strong><span class="badge badge-success" style="background-color:#468847"> Ok <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span></p>
            </li>
            <li>
                <p class="text-success"><strong>Paso 4:</strong><span class="badge badge-success" style="background-color:#468847"> Ok <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span></p>
            </li>
            <li>
                <p class="text-success"><strong>Paso 5:</strong><span class="badge badge-success" style="background-color:#468847"> Ok <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span></p>
            </li>
            <li>
                <p class="text-info">Por favor, complete los siguientes datos del <span class="label label-info">Paso 6</span> y finalice la consulta. Muchas gracias.</p>
            </li>
        </ul>
        <hr>
        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>
        <?= $this->Form->input('consulta_id', array('type' => 'hidden')); ?>
        <h2><small>Ciudad para la que se realiza la consulta</small></h2>
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
            <strong>Ayuda: </strong> Si no se completa se utilizar&aacute; su localidad: "<?= h(str_replace('?', 'ñ', $localidad['Localidade']['nombre']).' ('.$localidad['Localidade']['codigopostal'].') - '.$localidad['Provincia']['nombre']); ?>".
        </div>
        <div class="form-group">
            <?= $this->Form->label('provincia', 'Provincia', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('provincia_id', array('type' => 'select', 'empty' => 'Seleccionar...')); ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('localidade', 'Localidad', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('localidade_id', array('type' => 'select', 'empty' => 'Seleccionar...')); ?>
        </div>

        <h2>
            <small>Comentarios y Observaciones</small>
        </h2>
        <div class="form-group">
            <?= $this->Form->label('observaciones', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('observaciones', array('type' => 'textarea')); ?>
        </div>

        <div class="well well-sm text-right">
            <?= $this->Html->link(__('<i class="fa fa-hand-o-left"></i> Anterior'), array('controller' => 'consultas', 'action' => 'editarcinco', $consulta['Consulta']['id']), array('class' => 'btn btn-info','style' => 'float:left')); ?>
            <?= $this->Form->button('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Finalizar', array('class' => 'btn btn-primary','style' => 'float:right')); ?>
            <div style="clear: both;"></div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

<?php

//AJAX for Dynamic Drop down

$this->Js->get('#ConsultaProvinciaId')->event('change',

$this->Js->request(array(

'plugin'=>NULL,

'controller'=>'localidades',

'action' =>'obtener_localidades',

), array(

'update' =>'#ConsultaLocalidadeId',

'async' => true,

'method' => 'Post',

'dataExpression'=>true,

'data'=> $this->Js->serializeForm(array(

'isForm' => true,

'inline' => true

))

))

);

// END AJAX

?>
