<?php 
/**
 * @var $this View
 */
?><div class="row consultas form">
    <div class="col-md-12">
        <h1>Realizar Consulta <small>Paso 5 de 5</small></h1>

        <?= $this->Form->create('Consulta', array('class' => 'form-horizontal')); ?>

        <h2><small>Comentarios y Observaciones</small></h2>
        <div class="form-group">
            <?= $this->Form->label('observaciones', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('observaciones', array('type' => 'textarea')); ?>
        </div>

        <div class="well well-sm text-right">
            <?= $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar', array('class' => 'btn btn-primary')); ?>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>

